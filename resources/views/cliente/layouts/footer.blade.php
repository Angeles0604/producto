<footer class="bg-gray-800 p-4 mt-8">
    <div class="max-w-4xl mx-auto text-center text-gray-300">
        <p>&copy; {{ date('Y') }} Zapatería Online. Todos los derechos reservados.</p>
        <nav class="mt-2 space-x-4">
            <a href="{{ route('home') }}" class="hover:underline">Inicio</a>
            <a href="{{ route('catalog.index') }}" class="hover:underline">Catálogo</a>
            <a href="{{ route('terms') }}" class="hover:underline">Términos y condiciones</a>
        </nav>
    </div>
</footer>
