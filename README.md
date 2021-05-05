# Theming_ WordPress Theme

**Theming_** es un _starter_ theme para WordPress, sencillo y ligero, basado en **Bootstrap v5**.

## Instalación

### Manual

**Theming_** se instala como cualquier otro theme de WordPress, solo debes descargar el [archivo comprimido desde GitHub](https://github.com/themingisprose/theming_/archive/refs/heads/main.zip), descompactar el archivo `.zip` y copiar su contenido en el directorio `wp-content/themes/` de tu instalación, o subirlo usando el instalador de themes de WordPress.

### Instalar vía Git

Puedes clonar el repositorio directamente desde GitHub:

```bash
$ cd /path/to/wordpress/wp-content/themes/
$ git clone git@github.com:themingisprose/theming_.git
```

### Dependencias

**Theming_** requiere de algunas dependencias, para ello debes instalarlas vía `npm`. Debes tener [Node.js](https://nodejs.org/es/) instalado previamente en tu ordenador o servidor. Ejecuta los siguientes comandos desde tu CLI:

```bash
$ cd /path/to/wordpress/wp-content/themes/theming_/
$ npm install
$ npm run build
```

## Child Theme

Es recomendable siempre usar un [Child Theme](https://developer.wordpress.org/themes/advanced-topics/child-themes/), así se evita pérdida de datos y configuraciones cuando se realicen actualizaciones. Con este fin puedes usar [Theming Child](https://github.com/themingisprose/theming-child), que puedes clonar en forma de plantilla de GitHub.
