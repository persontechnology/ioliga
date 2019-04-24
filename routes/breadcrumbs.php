<?php

Breadcrumbs::for('inicio', function ($trail) {
    $trail->push('Inicio', url('/'));
});
