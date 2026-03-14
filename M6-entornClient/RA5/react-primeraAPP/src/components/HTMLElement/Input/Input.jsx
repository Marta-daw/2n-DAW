import styles from './Input.module.scss';

export const Input = ({ ...props}) => {
    //Combinem l'estil base del Design System amb els que ens arribi del prop

    const inputClasses = `${styles.baseInput} {$className}`

    return(
        <input className={inputClasses} {...props} />    
    );
};