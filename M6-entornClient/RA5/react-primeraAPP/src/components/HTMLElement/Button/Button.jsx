import styles from './Button.module.scss';

export const Button = ({ text, onClick, className }) => {
    //Combinem l'estil base del Design System amb els que ens arribi del prop
    
    const buttonClasses = `${styles.baseButton} ${className}`

    return(
        <button className={buttonClasses} onClick={onClick}>{text}</button>
    );
};