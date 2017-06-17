<?php
//frontend
Breadcrumbs::register('main', function($breadcrumbs) {
    $breadcrumbs->push('Главный', route('index'));
});
Breadcrumbs::register('submenu', function($breadcrumbs, $id) {
    $breadcrumbs->parent('main');
    $category = App\Submenu::find($id);
    if ($category->level == 2){
        $sub = \App\Submenu::find($category->relation);
        $breadcrumbs->push($sub->name, route('index.submenu', $sub->id));
        $breadcrumbs->push($category->name, route('index.submenu', $category->id));
    }
    else if ($category->level == 3){
        $sub = \App\Submenu::find($category->relation);
        $sub1 = \App\Submenu::find($sub->relation);
        $breadcrumbs->push($sub1->name, route('index.submenu', $sub1->id));
        $breadcrumbs->push($sub->name, route('index.submenu', $sub->id));
        $breadcrumbs->push($category->name, route('index.submenu', $category->id));
    }
    else if ($category->level == 4){
        $sub = \App\Submenu::find($category->relation);
        $sub1 = \App\Submenu::find($sub->relation);
        $sub2 = \App\Submenu::find($sub1->relation);
        $breadcrumbs->push($sub2->name, route('index.submenu', $sub2->id));
        $breadcrumbs->push($sub1->name, route('index.submenu', $sub1->id));
        $breadcrumbs->push($sub->name, route('index.submenu', $sub->id));
        $breadcrumbs->push($category->name, route('index.submenu', $category->id));
    }
    else {
        $breadcrumbs->push($category->name, route('index', $category->id));
    }
});

//admin
Breadcrumbs::register('admin', function($breadcrumbs) {
    $breadcrumbs->push('Админ', route('admin.index'));
});

Breadcrumbs::register('about', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('О компании', route('admin.about.index'));
});
Breadcrumbs::register('news', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Новости', route('admin.news.index'));
});
Breadcrumbs::register('partners', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Партнеры', route('admin.partners.index'));
});
Breadcrumbs::register('feedback', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Обратная свьяз', route('admin.feedback.index'));
});
Breadcrumbs::register('contact', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Контакты', route('admin.contact.index'));
});
Breadcrumbs::register('agent', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Наши агенты', route('admin.agent.index'));
});
Breadcrumbs::register('menuindex', function($breadcrumbs) {
    $breadcrumbs->parent('admin');
    $breadcrumbs->push('Все меню', route('admin.menu.index'));
});
Breadcrumbs::register('menu', function($breadcrumbs, $id) {
    $breadcrumbs->parent('admin');
    $category = App\Submenu::find($id);
    if ($category->level == 2){
        $sub = \App\Submenu::find($category->relation);
        $breadcrumbs->push($sub->name, route('admin.menu.show', $sub->id));
        $breadcrumbs->push($category->name, route('admin.menu.show', $category->id));
    }
    else if ($category->level == 3){
        $sub = \App\Submenu::find($category->relation);
        $sub1 = \App\Submenu::find($sub->relation);
        $breadcrumbs->push($sub1->name, route('admin.menu.show', $sub1->id));
        $breadcrumbs->push($sub->name, route('admin.menu.show', $sub->id));
        $breadcrumbs->push($category->name, route('admin.menu.show', $category->id));
    }
    else if ($category->level == 4){
        $sub = \App\Submenu::find($category->relation);
        $sub1 = \App\Submenu::find($sub->relation);
        $sub2 = \App\Submenu::find($sub1->relation);
        $breadcrumbs->push($sub2->name, route('admin.menu.show', $sub2->id));
        $breadcrumbs->push($sub1->name, route('admin.menu.show', $sub1->id));
        $breadcrumbs->push($sub->name, route('admin.menu.show', $sub->id));
        $breadcrumbs->push($category->name, route('admin.menu.show', $category->id));
    }
    else {
        $breadcrumbs->push($category->name, route('admin.menu.show', $category->id));
    }
});
Breadcrumbs::register('sub_edit', function($breadcrumbs , $id) {
    $category = App\Submenu::find($id);
    $breadcrumbs->parent('admin');
    $breadcrumbs->push($category->name, route('admin.menu.show', $category->id));
    $breadcrumbs->push('Изменит меню', route('admin.menu.edit',$category->id));
});
Breadcrumbs::register('sub_create', function($breadcrumbs) {
    $breadcrumbs->parent('menu');
    $breadcrumbs->push('Создать меню', route('admin.menu.create'));
});
//Breadcrumbs::register('sub_create_create', function($breadcrumbs) {
//    $breadcrumbs->parent('menu');
//    $breadcrumbs->push('Создать меню', route('admin.menu.create.item'));
//});



Breadcrumbs::register('page', function($breadcrumbs, $page) {
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});

