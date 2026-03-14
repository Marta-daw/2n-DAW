import styles from './Option.module.scss';

export const Options = ({ ...props}) => {
    
    const optionsStyle = `${styles.baseOption} ${props.className || ''}`; // Combina la clase de estilos con cualquier clase adicional pasada por props

    return (
        <option className={optionsStyle} {...props}>{props.children}</option>
    );
};