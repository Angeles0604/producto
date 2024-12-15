{{-- resources/views/components/growl.blade.php --}}

@if(session('success') || session('error') || $errors->any())
    <div id="growlNotification" class="growl-alert 
        {{ session('success') ? 'alert-success' : 'alert-error' }}">
        <strong>{{ session('success') ? '¡Éxito!' : 'Error:' }}</strong> 
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') ?? session('error') }}
        @endif
    </div>
@endif


<style>
    /* Estilos generales para la notificación tipo Growl */
    .growl-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        font-size: 16px;
        z-index: 1000;
        display: flex;
        align-items: center;
        animation: fadeOut 4s forwards;
    }

    /* Estilos específicos para éxito y error */
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .growl-alert strong {
        margin-right: 10px;
    }

    /* Animación para desvanecer la notificación */
    @keyframes fadeOut {
        0% {
            opacity: 1;
            transform: translateY(0);
        }

        80% {
            opacity: 1;
        }

        100% {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
</style>

<script>
    // Esperar un tiempo y luego ocultar la notificación
    setTimeout(() => {
        const notification = document.getElementById('growlNotification');
        if (notification) {
            notification.style.display = 'none';
        }
    }, 4000); // Ocultar después de 4 segundos
</script>