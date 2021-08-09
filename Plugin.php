<?php namespace Media1\MightySeoPlus;

use Backend;
use System\Classes\PluginBase;
use Event;

/**
 * MightySeoPlus Plugin Information File
 */
class Plugin extends PluginBase
{

    public $require = ['Lovata.MightySeo'];
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Mighty Seo Plus',
            'description' => 'Addon for Mighty SEO plugin for more advanced SEO settings.',
            'author'      => 'Media1',
            'icon'        => 'icon-leaf',
            'iconSvg'     => 'plugins/media1/mightyseoplus/assets/images/icon.svg'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

        Event::listen('backend.form.extendFields', function($widget) {

            if (!$widget->getController() instanceof \Lovata\MightySeo\Controllers\SeoPageParams) {
                return;
            }

            if (!$widget->model instanceof \Lovata\MightySeo\Models\SeoParam) {
                return;
            }

            $widget->addTabFields([
                'itemprop_name' => [
                    'label' => 'Itemprop name',
                    'tab' => 'Itemprop',
                    'comment' => 'Recommended length: 60 characters',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'itemprop_description' => [
                    'label' => 'Itemprop description',
                    'tab' => 'Itemprop',
                    'comment' => 'Recommended length: 155 - 160 characters',
                    'span' => 'right',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'itemprop_image' => [
                    'label' => 'Itemprop image',
                    'tab' => 'Itemprop',
                    'comment' => 'Recommended sizes: 128x128',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'og_title' => [
                    'label' => 'OpenGraph title',
                    'tab' => 'OpenGraph',
                    'comment' => 'Recommended length: 60 characters',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'og_description' => [
                    'label' => 'OpenGraph description',
                    'tab' => 'OpenGraph',
                    'comment' => 'Recommended length: 155 - 160 characters',
                    'span' => 'right',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'og_image' => [
                    'label' => 'OpenGraph image',
                    'tab' => 'OpenGraph',
                    'comment' => 'Recommended sizes: 600x600',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'og_type' => [
                    'label' => 'OpenGraph type',
                    'tab' => 'OpenGraph',
                    'comment' => 'OpenGraph type',
                    'span' => 'auto',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'twitter_title' => [
                    'label' => 'Twitter title',
                    'tab' => 'Twitter',
                    'comment' => 'Recommended length: 60 characters',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'twitter_description' => [
                    'label' => 'Twitter description',
                    'tab' => 'Twitter',
                    'comment' => 'Recommended length: 155 - 160 characters',
                    'span' => 'right',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'twitter_image' => [
                    'label' => 'Twitter image',
                    'tab' => 'Twitter',
                    'comment' => 'Recommended sizes: 600x600',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
                'itemtype' => [
                    'label' => 'Itemtype',
                    'tab' => 'Itemtype',
                    'comment' => 'itemtype',
                    'span' => 'left',
                    'type' => 'codeeditor',
                    'size' => 'huge',
                    'language' => 'twig',
                ],
            ]);

        });

        \Lovata\MightySeo\Models\SeoParam::extend(function($model) {

            $model->addFillable([
                'itemprop_name',
                'itemprop_description',
                'itemprop_image',
                'og_title',
                'og_description',
                'og_image',
                'og_type',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'itemtype'
            ]);

            $model->addCachedField([
                'itemprop_name',
                'itemprop_description',
                'itemprop_image',
                'og_title',
                'og_description',
                'og_image',
                'og_type',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'itemtype'
            ]);

            if (!$model->propertyExists('translatable')) {
                $model->addDynamicProperty('translatable', []);
            }

            $model->translatable = array_merge($model->translatable, [
                'itemprop_name',
                'itemprop_description',
                'og_title',
                'og_description',
                'twitter_title',
                'twitter_description',
            ]);
        });

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Media1\MightySeoPlus\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'media1.mightyseoplus.some_permission' => [
                'tab' => 'MightySeoPlus',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'mightyseoplus' => [
                'label'       => 'MightySeoPlus',
                'url'         => Backend::url('media1/mightyseoplus/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['media1.mightyseoplus.*'],
                'order'       => 500,
            ],
        ];
    }
}
