<?php

/* home/part-a/homepage_structure.twig */
class __TwigTemplate_967ea5883afaeb1ce3a38d7f8225aa0cf05b8a3c986666b99fb7c725144914f2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "home/part-a/homepage_structure.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo (isset($context["page_content"]) ? $context["page_content"] : null);
        echo "
    <h2>Please Login to Begin:</h2>
    <!--
    * Add IMG's of the some of the categories and restaurants in a carousel
    * MAybe change where the Login Button is
    -->

";
    }

    public function getTemplateName()
    {
        return "home/part-a/homepage_structure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends 'layout.twig' %}*/
/* */
/* {% block content %}*/
/*     {{ page_content|raw }}*/
/*     <h2>Please Login to Begin:</h2>*/
/*     <!--*/
/*     * Add IMG's of the some of the categories and restaurants in a carousel*/
/*     * MAybe change where the Login Button is*/
/*     -->*/
/* */
/* {% endblock %}*/
