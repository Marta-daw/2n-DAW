import styles from './Label.module.scss';

export const Label = ({ ...props }) => {
    //Combinem l'estil base del Design System amb els que ens arribi del prop
    
    const labelClasses = `${styles.baseLabel} {$className}`

    return(
        <label className={labelClasses} {...props} />    
    );
};