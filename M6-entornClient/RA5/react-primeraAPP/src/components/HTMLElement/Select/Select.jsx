import styles from "./Select.module.scss";

export const Select = ({children, ...props}) => {
    //Combinem l'estil base del Design System amb els que ens arribi del prop
    const selectClasses = `${styles.baseSelect} {$className}`;

    return (
        <select className={selectClasses} {...props}>
            {children}
        </select>   
    );
};