# *tags* Extension for TYPO3

This extension is currently in very early stages and not yet fully functional.

*tags* provides a generalized tagging functionality for arbitrary TYPO3 records (like pages, tt_content, sys_category, ..).

## Why

This extension is mainly aimed at developers / integrators to easily reference pages, content elements and other data types without 
having to configure UIDs somewhere for each referenced record.

This extension instead allows to just *tag* a record with a speaking name and reference that name later.

## Example Scenario

Imagine you have a page "Imprint" and you want to create a link to this page in your fluid template.  
Normally you would have to either configure the UID of the "imprint" page in TypoScript settings or worse, you would just hardcode the page UID in the template

With this extension you can instead just *tag* the page with the tag "imprint" and then resolve that tag to a page UID in your ViewHelper call like so:

```html
{namespace t=Hallgaeuer\Tags\ViewHelpers}

<f:link.page pageUid="{t:tagged.uid(tag: 'imprint', type: 'pages')}">
    Imprint
</f:link.page>
```

## Roadmap

* Tagging and rendering of content elements by tag
* Scoping when retrieving tagged data
* Retrieving records and even extbase models by tag
* API to programmatically add and remove tags 
* Nicer display of tags in TYPO3 backend (currently just TCA type="group" configuration)