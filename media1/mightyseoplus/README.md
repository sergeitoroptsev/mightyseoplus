# Mighty SEO Plus

Addon for Mighty SEO plugin for more advanced SEO settings.

###Added:
* Itemprop fields
* OpenGraph fields
* Twitter fields
* Itemtype field

###Installation:
1) Copy this repo to Your plugins directory
2) run composer install
3) run php artisan october:migrate

###If you declare itemtype in Your html section, Your code might look like this:
```
<html
    lang="{{ activeLocale }}"
    dir="ltr"
    itemscope
    {% if SeoToolbox.get('itemtype') is not empty %}
        itemtype="{{ SeoToolbox.get('itemtype')|raw }}"
    {% else %}
        itemtype="https://schema.org/WebPage"
    {% endif %}
    prefix="og:http://ogp.me/ns#"
>
```

###Your custom seotoolbox component (seotoolbox/default.htm) might look like this:
```
<title>{{ __SELF__.getTitle()|raw }}</title>
<meta name="description" content="{{ __SELF__.get('seo_description')|raw }}">
{% set sRobotsTag = __SELF__.getRobotsMeta() %}
{% if sRobotsTag is not empty %}
    <meta name="robots" content="{{ sRobotsTag }}">
{% endif %}
{% set sCanonicalURL = __SELF__.get('canonical_url') %}
{% if sCanonicalURL is not empty %}
    <link rel="canonical" href="{{ sCanonicalURL }}">
{% endif %}
<meta name="application-name" content="{{ __SELF__.getTitle()|raw }}" />
<meta name="referrer" content="strict-origin" />

{% set sItempropName = __SELF__.get('itemprop_name') %}
{% if sItempropName is not empty %}
    <meta itemprop="name" content="{{ sItempropName|raw }}" />
{% else %}
    <meta itemprop="name" content="{{ __SELF__.getTitle()|raw }}" />
{% endif %}
{% set sItempropDescription = __SELF__.get('itemprop_description') %}
{% if sItempropDescription is not empty %}
    <meta itemprop="description" content="{{ sItempropDescription|raw }}" />
{% else %}
    <meta itemprop="description" content="{{ __SELF__.get('seo_description')|raw }}" />
{% endif %}
{% set sItempropImage = __SELF__.get('itemprop_image') %}
{% if sItempropImage is not empty %}
    <meta itemprop="image" content="{{url('/')}}{{ sItempropImage|raw }}" />
{% else %}
    <meta itemprop="image" content="{{ 'assets/img/icons/128x128.png' | theme }}" />
{% endif %}

{% set sOgType = __SELF__.get('og_type') %}
{% if sOgType is not empty %}
    <meta property="og:type" content="{{ sOgType|raw }}" />
{% else %}
    <meta property="og:type" content="website" />
{% endif %}
<meta property="og:url" content="{{ url_current() | lower }}" />
{% set sOgTitle = __SELF__.get('og_title') %}
{% if sOgTitle is not empty %}
    <meta property="og:title" content="{{ sOgTitle|raw }}" />
{% else %}
    <meta property="og:title" content="{{ __SELF__.getTitle()|raw }}" />
{% endif %}
{% set sOgDescription = __SELF__.get('og_description') %}
{% if sOgDescription is not empty %}
    <meta property="og:description" content="{{ sOgDescription|raw }}" />
{% else %}
    <meta property="og:description" content="{{ __SELF__.get('seo_description')|raw }}" />
{% endif %}
{% set sOgImage = __SELF__.get('og_image') %}
{% if sOgImage is not empty %}
    <meta property="og:image" content="{{url('/')}}{{ sOgImage|raw }}" />
{% else %}
    <meta property="og:image" content="{{ 'assets/img/icons/600x600.png' | theme }}" />
{% endif %}
<meta property="og:locale" content="{{ activeLocale }}" />

{% set sTwitterTitle = __SELF__.get('twitter_title') %}
{% if sTwitterTitle is not empty %}
    <meta name="twitter:title" content="{{ sTwitterTitle|raw }}" />
{% else %}
    <meta name="twitter:title" content="{{ __SELF__.getTitle()|raw }}" />
{% endif %}
{% set sTwitterDescription = __SELF__.get('twitter_description') %}
{% if sTwitterDescription is not empty %}
    <meta name="twitter:description" content="{{ sTwitterDescription|raw }}" />
{% else %}
    <meta name="twitter:description" content="{{ __SELF__.get('seo_description')|raw }}" />
{% endif %}
    <meta name="twitter:url" content="{{ url_current() | lower }}" />
{% set sTwitterImage = __SELF__.get('twitter_image') %}
{% if sTwitterImage is not empty %}
    <meta name="twitter:image" content="{{url('/')}}{{ sTwitterImage|raw }}" />
{% else %}
    <meta name="twitter:image" content="{{ 'assets/img/icons/512x512.png' | theme }}" />
{% endif %}
```

