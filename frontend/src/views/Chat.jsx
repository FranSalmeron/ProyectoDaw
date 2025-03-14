import React from 'react'

const Chat = ({ sellerId, carId }) => {
  return (
      <div>
          <p>vendedor: {sellerId}</p>
          <p>coche: {carId}</p>
          {/* Aquí pondrías la lógica para cargar el chat, probablemente con un API */}
      </div>
  );
};

export default Chat