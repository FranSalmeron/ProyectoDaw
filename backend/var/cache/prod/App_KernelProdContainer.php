<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerWrznHzd\App_KernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerWrznHzd/App_KernelProdContainer.php') {
    touch(__DIR__.'/ContainerWrznHzd.legacy');

    return;
}

if (!\class_exists(App_KernelProdContainer::class, false)) {
    \class_alias(\ContainerWrznHzd\App_KernelProdContainer::class, App_KernelProdContainer::class, false);
}

return new \ContainerWrznHzd\App_KernelProdContainer([
    'container.build_hash' => 'WrznHzd',
    'container.build_id' => '83dadc0d',
    'container.build_time' => 1747905927,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerWrznHzd');
