(function(){
    // segundo = 1000;
    // timeSeg = 1000*60;
    const timeVo = 300000;
    const modalTime = new bootstrap.Modal(document.getElementById('modalTime'));
    var timeout;
    
    function resetTimer() {
        clearTimeout(timeout);
        timeout = setTimeout(function(){
            modalTime.show();
        }, timeVo);
    }
    resetTimer();  // Iniciar el temporizador de inactividad
    // Restablecer el temporizador en respuesta a la interacción del usuario
    document.addEventListener('mousemove', resetTimer);
    document.addEventListener('keydown', resetTimer);  
})();