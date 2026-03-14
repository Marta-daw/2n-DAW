import styles from './Header.module.scss';
import Icon from '../CardIcon/CardIcon.jsx';

function Header (){
    return(
        <header className={styles.header}>
            <div className={styles.textHeader}>
                <p><strong>Pràctica 6</strong></p>
                <p>Gestió de formularis i events en entorn client</p>
                <p>M0612 Desenvolupament Web en entorn client</p>
            </div>

            <Icon />
        </header>
    );
}

export default Header;