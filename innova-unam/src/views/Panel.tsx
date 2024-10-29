import NavBar from "../components/NavBar";

function Panel(){
    return(
        <div>
            <NavBar />
            <main>
                <h1>Panel de Administración</h1>
                <div id="lista">
                    <p>Eventos</p>
                    <ol>
                        <li><p>Festival del Emprendimiento</p><p>10</p><p>10</p></li>
                        <li><p>Nombre del evento</p><p>No. horas por subevento</p><p>No.horas</p></li>
                    </ol>
                    <button id="crear">Crear Nuevo</button>
                    <button id="editar">Editar</button>
                </div>
                <div id="descarga">
                    <h2>Descarga</h2>
                    <p>Descargar todos</p>
                    <button>.csv</button>
                    <button>.json</button>
                    <p>Descargar uno</p>
                    <button>.csv</button>
                    <button>.json</button>
                </div>
            </main>
        </div>
    );
}

export default Panel;