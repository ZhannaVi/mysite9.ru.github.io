<?php

    $grocery_supermarket_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $grocery_supermarket_scroll_position = get_theme_mod( 'grocery_supermarket_scroll_top_position','Right');
    if($grocery_supermarket_scroll_position == 'Right'){
        $grocery_supermarket_theme_css .='#button{';
            $grocery_supermarket_theme_css .='right: 20px;';
        $grocery_supermarket_theme_css .='}';
    }else if($grocery_supermarket_scroll_position == 'Left'){
        $grocery_supermarket_theme_css .='#button{';
            $grocery_supermarket_theme_css .='left: 20px;';
        $grocery_supermarket_theme_css .='}';
    }else if($grocery_supermarket_scroll_position == 'Center'){
        $grocery_supermarket_theme_css .='#button{';
            $grocery_supermarket_theme_css .='right: 50%;left: 50%;';
        $grocery_supermarket_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/

    $grocery_supermarket_theme_lay = get_theme_mod( 'grocery_supermarket_slider_opacity_color','0.5');
    if($grocery_supermarket_theme_lay == '0'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.1'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.1';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.2'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.2';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.3'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.3';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.4'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.4';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.5'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.5';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.6'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.6';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.7'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.7';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.8'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.8';
        $grocery_supermarket_theme_css .='}';
        }else if($grocery_supermarket_theme_lay == '0.9'){
        $grocery_supermarket_theme_css .='.slider-box img{';
            $grocery_supermarket_theme_css .='opacity:0.9';
        $grocery_supermarket_theme_css .='}';
        }