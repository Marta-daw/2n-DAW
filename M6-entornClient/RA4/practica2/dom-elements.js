// Classe base
class DomElement {
    constructor(tag, attributes = {}) {
        this.tag = tag; // Etiqueta de l'element
        this.attributes = attributes; // Atributs de l'element
        this.element = null; // Element DOM creat
    }

    get tag() {
        return this.tag;
    }

    get attributes() {
        return this.attributes;
    }

    get element() {
        return this.element;
    }

    set tag(valor) {
        if (typeof valor === 'string' && valor.trim() !== '') {
            this.tag = valor;
        } else {
            throw new Error('El nom de l\'etiqueta ha de ser una cadena no buida.');
        }
    }

    set attributes(valor) {
        if (typeof valor === 'object' && valor !== null) {
            this.attributes = valor;
        } else {
            throw new Error('Els atributs han de ser un objecte.');
        }
    }

    set element(valor) {
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

    printElement(position = 'beforeend', parentId = 'body') {
        const parent = document.getElementById(parentId) || document.body;
        parent.insertAdjacentElement(position, this.element);
        return this;
    }

    deleteElement() {
        if (this.element && this.element.parentNode) {
            this.element.parentNode.removeChild(this.element);
            this.element = null;
        }
    }

    addListener(event, callback) {
        if (this.element) {
            this.element.addEventListener(event, callback);
        }
        return this;
    }

    removeListener(event, callback) {
        if (this.element) {
            this.element.removeEventListener(event, callback);
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

    get children() {
        return this.children;
    }

    set children(valor) {
        if (Array.isArray(valor)) {
            this.children = valor;
        } else {
            throw new Error('Els fills han de ser un array.');
        }
    }
}

class OnlyTagElement extends DomElement {

}

class ElementWithText extends DomElement {
    constructor(tag, attributes = {}, text = '') {
        super(tag, attributes);
        this.text = text; // Elements fills
    }

    get text() {
        return this.text;
    }

    set text(valor) {
        if (typeof valor === 'string' && valor.trim() !== '') {
            this.text = valor;
        } else {
            throw new Error('El text ha de ser una cadena no buida.');
        }
    }
}
class SelectElement extends DomElement {
    constructor(tag, attributes = {}, elements = [{}]) {
        super(tag, attributes);
        this.elements = elements; // Elements fills
    }

    createOptions() {

    }

    createElement() {

    }
}

// Exportar
export { DomElement };
export { CompoundElement };
export { OnlyTagElement };
export { ElementWithText };
export { SelectElement };