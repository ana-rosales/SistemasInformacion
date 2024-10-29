import Footer from "../components/Footer";
import NavBar from "../components/NavBar";

import styles from "./Home.module.css";

function Home() {
    return(
        <div className = {styles.home}>
            <NavBar />
            <main>
                    <h1>¡Bienvenido!</h1>
                    <button id={styles["inicioSesion"]}>Iniciar Sesión</button>
                    <button id={styles["registro"]}>Registrarse</button>
            </main>
            <Footer />
        </div>
    )
    
}

export default Home;