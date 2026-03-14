import style from './Image.module.scss';

export const Image = ({ src, alt }) => {
    const imgClass = `${style.image} ${style[alt.toLowerCase().replace(/\s/g, '-')] || ''}`; // Assignem una classe específica basada en el alt, si existeix
    return <img src={src} alt={alt} className={imgClass} />;
}
