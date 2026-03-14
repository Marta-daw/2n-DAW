import { useEffect, useState } from "react"
import styles from './Books.module.scss'; //--> Mirar com fer que els estils estiguin en el .scss (primer instalar sass: npm install -D sass)

function Books() {
    const [books, setBooks] = useState([]);

    const [loading, setLoading] = useState(true); 

    useEffect(() => {
        fetch('../../../public/books.xml')
            .then (response => response.text())
            .then (data => {
                const parser = new DOMParser();
                const xmlDoc = parser.parseFromString(data, "text/xml");

                const bookNode = xmlDoc.getElementsByTagName("book");

                const infoBooks = Array.from(bookNode).map(book => {
                    return ({
                        id: book.getAttribute("id"),
                        author: book.getElementsByTagName("author")[0].textContent,
                        title: book.getElementsByTagName("title")[0].textContent,
                        genre: book.getElementsByTagName("genre")[0].textContent,
                        price: book.getElementsByTagName("price")[0].textContent,
                        publish_date: book.getElementsByTagName("publish_date")[0].textContent,
                        description: book.getElementsByTagName("description")[0].textContent
                    })
                });
                
                setBooks(infoBooks);
                setLoading(false);

                console.log(books);
            })
            .catch(error => {
                console.error('Error al cargar los datos: ', error);
                setLoading(false);
            });
        
            
    }, []);

    if (loading) {
        return <div>Carregant ...</div>
    }

    return (
        <div>
            <p className={styles.titleACT}>Activitat 2</p>
            {books.map(book => (
                <div key={book.id} className={styles.bookCard}>
                    <h2>Book Ref: {book.id}</h2>
                    <p className={styles.elementList}><span className={styles.textBlod}>Author:</span> {book.author}</p>
                    <p className={styles.elementList}><span className={styles.textBlod}>Title:</span> {book.title}</p>
                    <p className={styles.elementList}><span className={styles.textBlod}>Genre:</span> {book.genre}</p>
                    <p className={styles.elementList}><span className={styles.textBlod}>Price:</span> {book.price}</p>
                    <p className={styles.elementList}><span className={styles.textBlod}>Publish_date:</span> {book.publish_date}</p>
                    <p className={styles.elementList}><span className={styles.textBlod}>Description:</span> {book.description}</p>
                </div>
            ))}
        </div>
    )

}

export default Books;