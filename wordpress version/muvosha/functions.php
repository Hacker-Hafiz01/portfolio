<?php
function my_theme_enqueue_scripts_and_styles() {
    // Подключение файла стилей main.css
    wp_enqueue_style('my-main-style', get_template_directory_uri() . '/assets/css/main.css');

    // Подключение файла скриптов main.js
    wp_enqueue_script('my-main-script', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts_and_styles');


function my_theme_enqueue_google_fonts() {
    // Предварительное подключение к Google Fonts
    wp_enqueue_style('google-fonts-preconnect', 'https://fonts.googleapis.com', [], null);
    wp_enqueue_style('google-fonts-gstatic-preconnect', 'https://fonts.gstatic.com', [], null, true);
  
    // Подключение шрифтов Nunito с различными начертаниями
    wp_enqueue_style('google-fonts-nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_google_fonts');

function add_crossorigin_attribute($html, $handle) {
    if ($handle === 'google-fonts-gstatic-preconnect') {
        return str_replace(" href", " crossorigin='anonymous' href", $html);
    }
    return $html;
}

add_filter('style_loader_tag', 'add_crossorigin_attribute', 10, 2);

?>