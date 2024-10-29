import styles from "./NavBar.module.css";

function NavBar() {
    return (
    <div className = {styles.navbar}>
        <header>
                <nav>
                    <a href="index.html"><i className="fas fa-home fa-lg"></i></a>
                </nav>
        </header>
    </div>
    );
}

export default NavBar;