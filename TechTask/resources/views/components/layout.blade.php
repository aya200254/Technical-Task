<!DOCTYPE html>
<html>
    <head>
        <!-- Head content -->
    </head>
    <body>
        <header>
            {{ $header ?? '' }}
        </header>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>
