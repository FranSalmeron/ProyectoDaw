import { useEffect } from 'react';



const MercureNotifications = () => {
    useEffect(() => {
        const url = 'http://localhost/mercure'; // URL del servidor Mercure
        const topic = 'http://example.com/my-topic'; // El tema que quieres suscribirte

        // Crear la conexión a Mercure
        const mercure = new EventSource(url + '?topic=' + encodeURIComponent(topic));

        // Manejar los eventos cuando llegan
        mercure.onmessage = function(event) {
            const data = JSON.parse(event.data);
            console.log('Mercure event received:', data);
        };

        // Limpiar la conexión cuando el componente se desmonte
        return () => {
            mercure.close();
        };
    }, []); // Este efecto solo se ejecuta una vez cuando el componente se monta

    return (
        <div>
            <h3>Notificaciones en tiempo real</h3>
            <p>Esperando eventos...</p>
        </div>
    );
};

export default MercureNotifications;
