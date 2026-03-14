// Classe base
class DomElement {
    constructor(tag, attributes = {}) {
        this.tag = tag; // Etiqueta de l'element
        this.attributes = attributes; // Atributs de l'element
        this.element = null; // Element DOM creat
    }

    get tagElement() {
        return this.tag;
    }

    get attributesElement() {
        return this.attributes;
    }

    get htmlElement() {
        return this.element;
    }

    set tagElement(valor) {
        if (typeof valor === 'string' && valor.trim() !== '') {
            this.tag = valor;
        } else {
            throw new Error('El nom de l\'etiqueta ha de ser una cadena no buida.');
        }
    }

    set attributesElement(valor) {
        if (typeof valor === 'object' && valor !== null) {
            this.attributes = valor;
        } else {
            throw new Error('Els atributs han de ser un objecte.');
        }
    }

    set htmlElement(valor) {
        this.element = valor;
    }

    createElement() {
        this.element = document.createElement(this.tag);

        // Afegir atributs
        for (let [key, value] of Object.entries(this.attributes)) {
            this.element.setAttribute(key, value);
        }

        return this; // Per encadenar
    }

    printElement(position = { position: String, parentId: String }) {
        const parent = document.getElementById(position.parentId);
        console.log('Parent ', parent);

        if (!parent || !this.element) return this;

        const positionElement = (position.position == null) ? 'beforeend' : position.position;

        parent.insertAdjacentElement(positionElement, this.element);
        return this;
    }

    deleteElement() {
        if (this.element?.parentNode) {
            this.element.remove();
        }

        return this;
    }

    addListener(event, actionFn) {
        if (this.element) {
            this.element.addEventListener(actionFn, event);
        }
        return this;
    }

    removeListener(event, actionFn) {
        if (this.element) {
            this.element.removeEventListener(event, actionFn);
        }
        return this;
    }
}

//Mirar be aquestes classes
class CompoundElement extends DomElement {
    constructor(tag, attributes = {}, children = []) {
        super(tag, attributes);
        this.children = children; // Elements fills
    }

    get childrenElement() {
        return this.children;
    }

    set childrenElement(valor) {
        if (Array.isArray(valor)) {
            this.children = valor;
        } else {
            throw new Error('Els fills han de ser un array.');
        }
    }

    addChildren(children = []) {
        this.children.push(...children);
        return this;
    }

    createElement() {
        super.createElement();

        this.children.forEach(child => {
            if (!child.element) child.createElement();
            this.element.appendChild(child.element);
        });

        return this;
    }
}

class OnlyTagElement extends DomElement {
    constructor(tag, attributes = {}) {
        super(tag, attributes);
    }

}

class ElementWithText extends DomElement {
    constructor(tag, attributes = {}, text = '') {
        super(tag, attributes);
        this.text = text; // Elements fills
    }

    get textContent() {
        return this.text;
    }

    set textContent(valor) {
        if (typeof valor === 'string' && valor.trim() !== '') {
            this.text = valor;
        } else {
            throw new Error('El text ha de ser una cadena no buida.');
        }
    }

    createElement() {
        super.createElement();
        this.element.textContent = this.text;
        return this;
    }
}

class SelectElement extends DomElement {
    constructor(attributes = {}, options = []) {
        super('select', attributes);
        this.options = options; // Opcions del select
    }

    createOptions(elements = this.options) {
        if (!this.element) return this;

        elements.forEach(opt => {
            const opcioEl = document.createElement('option');
            opcioEl.value = opt.value || '';
            opcioEl.textContent = opt.text || '';
            this.element.appendChild(opcioEl);
        });

        return this;
    }

    createElement() {
        super.createElement();
        this.createOptions();
        return this;
    }
}

// Exportar
export { DomElement };
export { CompoundElement };
export { OnlyTagElement };
export { ElementWithText };
export { SelectElement };