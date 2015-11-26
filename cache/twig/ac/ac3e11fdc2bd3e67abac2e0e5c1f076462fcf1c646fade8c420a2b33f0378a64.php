<?php

/* layout.twig */
class __TwigTemplate_f981283cba06b5210f88d5f70f3ae2e36581e24b93344183a851f54a70276de4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'flash_messages' => array($this, 'block_flash_messages'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 13
        echo "    </head>
    
    <body>
 <div id=\"wrapper\">
 <div id=\"page-content-wrapper\">
    <div class=\"container-fluid\">
        ";
        // line 19
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 49
        echo "
        <div class=\"row\">
            <div class=\"col-lg-12\">
                ";
        // line 52
        $this->displayBlock('content', $context, $blocks);
        // line 55
        echo "
            </div>
        </div>
    </div>
 </div>
 </div>
</body>
</html>
";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "            <meta charset=\"utf-8\">
            <meta name=\"description\" content=\"\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
            <title>Top 5</title>
            <link rel=\"stylesheet\" href=\"css/style.css\">
            <link rel=\"stylesheet\" href=\"css/bootstrap.css\">
            <link rel=\"author\" href=\"humans.txt\">
        ";
    }

    // line 19
    public function block_flash_messages($context, array $blocks = array())
    {
        // line 20
        echo "            ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array())) {
            // line 21
            echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"alert alert-success\" role=\"alert\">
                            ";
            // line 25
            echo "                            <ul>
                                ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 27
                echo "                                    <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "                            </ul>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 34
        echo "            ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array())) {
            // line 35
            echo "                <div class=\"row\">
                    <div class=\"col-lg-12\">
                        <div class=\"alert alert-danger\" role=\"alert\">
                            ";
            // line 39
            echo "                            <ul>
                                ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 41
                echo "                                    <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "                            </ul>
                        </div>
                    </div>
                </div>
            ";
        }
        // line 48
        echo "        ";
    }

    // line 52
    public function block_content($context, array $blocks = array())
    {
        // line 53
        echo "                    ";
        // line 54
        echo "                ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  146 => 54,  144 => 53,  141 => 52,  137 => 48,  130 => 43,  121 => 41,  117 => 40,  114 => 39,  109 => 35,  106 => 34,  99 => 29,  90 => 27,  86 => 26,  83 => 25,  78 => 21,  75 => 20,  72 => 19,  61 => 5,  58 => 4,  46 => 55,  44 => 52,  39 => 49,  37 => 19,  29 => 13,  27 => 4,  22 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         {% block head %}*/
/*             <meta charset="utf-8">*/
/*             <meta name="description" content="">*/
/*             <meta name="viewport" content="width=device-width, initial-scale=1">*/
/*             <title>Top 5</title>*/
/*             <link rel="stylesheet" href="css/style.css">*/
/*             <link rel="stylesheet" href="css/bootstrap.css">*/
/*             <link rel="author" href="humans.txt">*/
/*         {% endblock %}*/
/*     </head>*/
/*     */
/*     <body>*/
/*  <div id="wrapper">*/
/*  <div id="page-content-wrapper">*/
/*     <div class="container-fluid">*/
/*         {% block flash_messages %}*/
/*             {% if flash_messages.success %}*/
/*                 <div class="row">*/
/*                     <div class="col-lg-12">*/
/*                         <div class="alert alert-success" role="alert">*/
/*                             {# display flash messages #}*/
/*                             <ul>*/
/*                                 {% for msg in flash_messages.success %}*/
/*                                     <li>{{ msg }}</li>*/
/*                                     {% endfor %}*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             {% endif %}*/
/*             {% if flash_messages.danger %}*/
/*                 <div class="row">*/
/*                     <div class="col-lg-12">*/
/*                         <div class="alert alert-danger" role="alert">*/
/*                             {# display flash messages #}*/
/*                             <ul>*/
/*                                 {% for msg in flash_messages.danger %}*/
/*                                     <li>{{ msg }}</li>*/
/*                                     {% endfor %}*/
/*                             </ul>*/
/*                         </div>*/
/*                     </div>*/
/*                 </div>*/
/*             {% endif %}*/
/*         {% endblock %}*/
/* */
/*         <div class="row">*/
/*             <div class="col-lg-12">*/
/*                 {% block content %}*/
/*                     {# Main Page content #}*/
/*                 {% endblock %}*/
/* */
/*             </div>*/
/*         </div>*/
/*     </div>*/
/*  </div>*/
/*  </div>*/
/* </body>*/
/* </html>*/
/* */
