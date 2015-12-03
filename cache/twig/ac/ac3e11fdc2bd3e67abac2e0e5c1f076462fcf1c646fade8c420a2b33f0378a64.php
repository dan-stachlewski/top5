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
            'sidebar' => array($this, 'block_sidebar'),
            'topnavbar' => array($this, 'block_topnavbar'),
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
        // line 23
        echo "    </head>

    <body>
        <div id=\"wrapper\">
            
            <!-- ============ SIDEBAR START ============ -->
            <div id=\"sidebar-wrapper\">
                ";
        // line 30
        $this->displayBlock('sidebar', $context, $blocks);
        // line 53
        echo "            </div>
            <!-- ============ SIDEBAR END ============ -->
            
            <!-- ============ MAIN PAGE CONTENT WRAPPER ============ -->
            <div id=\"page-content-wrapper\">
                <div class=\"container-fluid\">
                    <!-- ============ NAVBAR START ============ -->  
                    <nav class=\"navbar navbar-default  \">
                        <div class=\"navbar-header\">
                            <div class=\"container-fluid\">
                                <div class=\"row\">
                                    ";
        // line 64
        $this->displayBlock('topnavbar', $context, $blocks);
        // line 107
        echo "                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div> <!-- /.navbar-header -->
                    </nav>
                    <!-- ============ NAVBAR END ============ -->
                    
                    <!-- ============ FLASH MESSAGES START ============ --> 
                    ";
        // line 114
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 144
        echo "                    <!-- ============ FLASH MESSAGES END ============ --> 
                    
                    <!-- ============ MAIN CONTENT START ============ -->                     
                    <div class=\"row\">
                        <div class=\"col-lg-12\">
                            ";
        // line 149
        $this->displayBlock('content', $context, $blocks);
        // line 152
        echo "                        </div><!-- /.col-lg-12-->
                    </div><!-- /.row-->
                    <!-- ============ MAIN CONTENT END ============ -->
                
                </div><!-- /.container-fluid -->
            </div><!-- /#page-content-wrapper -->
            <!-- ============ MAIN PAGE CONTENT WRAPPER ============ -->

        <!-- ============ BOOTSTRAP JS INC NAVBAR TOGGLE START ============ -->
            <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/js/jquery.js\"></script>
            <!-- Bootstrap Core JavaScript -->
            <script src=\"";
        // line 163
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/js/bootstrap.min.js\"></script>
            <!-- Menu Toggle Script -->
            <script>
                \$(\"#menu-toggle\").click(function (e) {
                    e.preventDefault();
                    \$(\"#wrapper\").toggleClass(\"toggled\");
                });
            </script>
        <!-- ============ BOOTSTRAP JS INC NAVBAR TOGGLED END ============ -->
        
        </div><!-- /#wrapper -->
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
            <!-- Bootstrap Core CSS -->
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/css/bootstrap.min.css\" rel=\"stylesheet\">

            <!-- Custom CSS -->
            <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('slim')->baseUrl(), "html", null, true);
        echo "/css/simple-sidebar.css\" rel=\"stylesheet\">

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
            <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>
            <![endif]-->
            <link rel=\"author\" href=\"humans.txt\">
        ";
    }

    // line 30
    public function block_sidebar($context, array $blocks = array())
    {
        // line 31
        echo "                    <ul class=\"sidebar-nav\">
                        <li class=\"sidebar-brand\">
                            <a href=\"#\">
                                Get Slim with Slim
                            </a>
                        </li>
                        ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["homes"]) ? $context["homes"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["home"]) {
            // line 38
            echo "                            <li>
                                <a href=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("homes", array("fname" => $this->getAttribute($context["home"], "slug", array()))), "html", null, true);
            echo "\"> ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["home"], "fname", array()), "html", null, true);
            echo "</a>
                            </li>
                            ";
            // line 41
            if ((((isset($context["current_file"]) ? $context["current_file"] : null) == $this->getAttribute($context["home"], "fname", array())) &&  !twig_test_empty($this->getAttribute($context["home"], "anchors", array())))) {
                // line 42
                echo "                                <ul>
                                    ";
                // line 43
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["home"], "anchors", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["anchor"]) {
                    // line 44
                    echo "                                        <li>
                                            <a href=\"#";
                    // line 45
                    echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                    echo "\"> ";
                    echo twig_escape_filter($this->env, $context["anchor"], "html", null, true);
                    echo "</a>
                                        </li>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['anchor'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "                                </ul>
                            ";
            }
            // line 50
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['home'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                    </ul>
                ";
    }

    // line 64
    public function block_topnavbar($context, array $blocks = array())
    {
        // line 65
        echo "                                        <div class=\"col-sm-3\">
                                            <a href=\"#menu-toggle\" class=\"btn btn-default navbar-text\" id=\"menu-toggle\">Toggle Menu</a>
                                        </div><!-- /.col-sm-3 -->
                                        <div class=\"dropdown col-sm-4\">
                                            <button class=\"btn  btn-default dropdown-toggle navbar-text\" type=\"button\" data-toggle=\"dropdown\">Calculators
                                                <span class=\"caret\"></span>
                                            </button>
                                            <ul class=\"dropdown-menu\">
                                                <li><a href=\"\"></a></li>
                                                <li><a href=\"\"></a></li>
                                            </ul>
                                        </div>

                                        <div class=\"dropdown col-sm-5\">
                                            <button class=\"btn  btn-default dropdown-toggle navbar-text\" type=\"button\"data-toggle=\"dropdown\">User
                                                <span class=\"caret\"></span>
                                            </button>
                                            <ul class=\"dropdown-menu\">
                                                ";
        // line 83
        if ( !(isset($context["userLogged"]) ? $context["userLogged"] : null)) {
            echo " 
                                                    <li>
                                                        <a href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("login"), "html", null, true);
            echo "\">Login</a>
                                                    </li>
                                                    <li>
                                                        <a href=\"";
            // line 88
            echo twig_escape_filter($this->env, $this->env->getExtension('slim')->pathFor("register"), "html", null, true);
            echo "\">Register</a>
                                                    </li> 
                                                    ";
        } else {
            // line 90
            echo "  
                                                    <li>
                                                        <a href=\"\">Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href=\"\">Logout</a>
                                                    </li> 
                                                    ";
            // line 97
            if ((isset($context["isAdministrator"]) ? $context["isAdministrator"] : null)) {
                // line 98
                echo "                                                        <li class=\"divider\"></li>
                                                        <li>
                                                            <a href=\"\">Admin Dashboard</a>
                                                        </li>
                                                        ";
            }
            // line 103
            echo "                                                ";
        }
        // line 104
        echo "                                            </ul>
                                        </div><!-- /.dropdown col-sm-5 -->
                                    ";
    }

    // line 114
    public function block_flash_messages($context, array $blocks = array())
    {
        // line 115
        echo "                        ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array())) {
            // line 116
            echo "                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <div class=\"alert alert-success\" role=\"alert\">
                                        ";
            // line 120
            echo "                                        <ul>
                                            ";
            // line 121
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "success", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 122
                echo "                                                <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 124
            echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        // line 129
        echo "                        ";
        if ($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array())) {
            // line 130
            echo "                            <div class=\"row\">
                                <div class=\"col-lg-12\">
                                    <div class=\"alert alert-danger\" role=\"alert\">
                                        ";
            // line 134
            echo "                                        <ul>
                                            ";
            // line 135
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["flash_messages"]) ? $context["flash_messages"] : null), "danger", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
                // line 136
                echo "                                                <li>";
                echo twig_escape_filter($this->env, $context["msg"], "html", null, true);
                echo "</li>
                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['msg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 138
            echo "                                        </ul>
                                    </div>
                                </div>
                            </div>
                        ";
        }
        // line 143
        echo "                    ";
    }

    // line 149
    public function block_content($context, array $blocks = array())
    {
        // line 150
        echo "                                ";
        // line 151
        echo "                            ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  345 => 151,  343 => 150,  340 => 149,  336 => 143,  329 => 138,  320 => 136,  316 => 135,  313 => 134,  308 => 130,  305 => 129,  298 => 124,  289 => 122,  285 => 121,  282 => 120,  277 => 116,  274 => 115,  271 => 114,  265 => 104,  262 => 103,  255 => 98,  253 => 97,  244 => 90,  238 => 88,  232 => 85,  227 => 83,  207 => 65,  204 => 64,  199 => 51,  193 => 50,  189 => 48,  178 => 45,  175 => 44,  171 => 43,  168 => 42,  166 => 41,  159 => 39,  156 => 38,  152 => 37,  144 => 31,  141 => 30,  127 => 13,  121 => 10,  114 => 5,  111 => 4,  93 => 163,  88 => 161,  77 => 152,  75 => 149,  68 => 144,  66 => 114,  57 => 107,  55 => 64,  42 => 53,  40 => 30,  31 => 23,  29 => 4,  24 => 1,);
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
/*             <!-- Bootstrap Core CSS -->*/
/*             <link href="{{ base_url() }}/css/bootstrap.min.css" rel="stylesheet">*/
/* */
/*             <!-- Custom CSS -->*/
/*             <link href="{{ base_url() }}/css/simple-sidebar.css" rel="stylesheet">*/
/* */
/*             <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*             <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*             <!--[if lt IE 9]>*/
/*             <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*             <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>*/
/*             <![endif]-->*/
/*             <link rel="author" href="humans.txt">*/
/*         {% endblock %}*/
/*     </head>*/
/* */
/*     <body>*/
/*         <div id="wrapper">*/
/*             */
/*             <!-- ============ SIDEBAR START ============ -->*/
/*             <div id="sidebar-wrapper">*/
/*                 {% block sidebar %}*/
/*                     <ul class="sidebar-nav">*/
/*                         <li class="sidebar-brand">*/
/*                             <a href="#">*/
/*                                 Get Slim with Slim*/
/*                             </a>*/
/*                         </li>*/
/*                         {% for home in homes %}*/
/*                             <li>*/
/*                                 <a href="{{ path_for('homes', {fname : home.slug}) }}"> {{ home.fname }}</a>*/
/*                             </li>*/
/*                             {% if current_file == home.fname and home.anchors is not empty %}*/
/*                                 <ul>*/
/*                                     {% for anchor in home.anchors %}*/
/*                                         <li>*/
/*                                             <a href="#{{ anchor }}"> {{ anchor }}</a>*/
/*                                         </li>*/
/*                                     {% endfor %}*/
/*                                 </ul>*/
/*                             {% endif %}*/
/*                         {% endfor %}*/
/*                     </ul>*/
/*                 {% endblock %}*/
/*             </div>*/
/*             <!-- ============ SIDEBAR END ============ -->*/
/*             */
/*             <!-- ============ MAIN PAGE CONTENT WRAPPER ============ -->*/
/*             <div id="page-content-wrapper">*/
/*                 <div class="container-fluid">*/
/*                     <!-- ============ NAVBAR START ============ -->  */
/*                     <nav class="navbar navbar-default  ">*/
/*                         <div class="navbar-header">*/
/*                             <div class="container-fluid">*/
/*                                 <div class="row">*/
/*                                     {% block topnavbar %}*/
/*                                         <div class="col-sm-3">*/
/*                                             <a href="#menu-toggle" class="btn btn-default navbar-text" id="menu-toggle">Toggle Menu</a>*/
/*                                         </div><!-- /.col-sm-3 -->*/
/*                                         <div class="dropdown col-sm-4">*/
/*                                             <button class="btn  btn-default dropdown-toggle navbar-text" type="button" data-toggle="dropdown">Calculators*/
/*                                                 <span class="caret"></span>*/
/*                                             </button>*/
/*                                             <ul class="dropdown-menu">*/
/*                                                 <li><a href=""></a></li>*/
/*                                                 <li><a href=""></a></li>*/
/*                                             </ul>*/
/*                                         </div>*/
/* */
/*                                         <div class="dropdown col-sm-5">*/
/*                                             <button class="btn  btn-default dropdown-toggle navbar-text" type="button"data-toggle="dropdown">User*/
/*                                                 <span class="caret"></span>*/
/*                                             </button>*/
/*                                             <ul class="dropdown-menu">*/
/*                                                 {% if not userLogged %} */
/*                                                     <li>*/
/*                                                         <a href="{{ path_for('login') }}">Login</a>*/
/*                                                     </li>*/
/*                                                     <li>*/
/*                                                         <a href="{{ path_for('register') }}">Register</a>*/
/*                                                     </li> */
/*                                                     {% else %}  */
/*                                                     <li>*/
/*                                                         <a href="">Profile</a>*/
/*                                                     </li>*/
/*                                                     <li>*/
/*                                                         <a href="">Logout</a>*/
/*                                                     </li> */
/*                                                     {% if  isAdministrator %}*/
/*                                                         <li class="divider"></li>*/
/*                                                         <li>*/
/*                                                             <a href="">Admin Dashboard</a>*/
/*                                                         </li>*/
/*                                                         {% endif %}*/
/*                                                 {% endif %}*/
/*                                             </ul>*/
/*                                         </div><!-- /.dropdown col-sm-5 -->*/
/*                                     {% endblock %}*/
/*                                 </div><!-- /.row -->*/
/*                             </div><!-- /.container-fluid -->*/
/*                         </div> <!-- /.navbar-header -->*/
/*                     </nav>*/
/*                     <!-- ============ NAVBAR END ============ -->*/
/*                     */
/*                     <!-- ============ FLASH MESSAGES START ============ --> */
/*                     {% block flash_messages %}*/
/*                         {% if flash_messages.success %}*/
/*                             <div class="row">*/
/*                                 <div class="col-lg-12">*/
/*                                     <div class="alert alert-success" role="alert">*/
/*                                         {# display flash messages #}*/
/*                                         <ul>*/
/*                                             {% for msg in flash_messages.success %}*/
/*                                                 <li>{{ msg }}</li>*/
/*                                                 {% endfor %}*/
/*                                         </ul>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         {% endif %}*/
/*                         {% if flash_messages.danger %}*/
/*                             <div class="row">*/
/*                                 <div class="col-lg-12">*/
/*                                     <div class="alert alert-danger" role="alert">*/
/*                                         {# display flash messages #}*/
/*                                         <ul>*/
/*                                             {% for msg in flash_messages.danger %}*/
/*                                                 <li>{{ msg }}</li>*/
/*                                                 {% endfor %}*/
/*                                         </ul>*/
/*                                     </div>*/
/*                                 </div>*/
/*                             </div>*/
/*                         {% endif %}*/
/*                     {% endblock %}*/
/*                     <!-- ============ FLASH MESSAGES END ============ --> */
/*                     */
/*                     <!-- ============ MAIN CONTENT START ============ -->                     */
/*                     <div class="row">*/
/*                         <div class="col-lg-12">*/
/*                             {% block content %}*/
/*                                 {# Main Page content #}*/
/*                             {% endblock %}*/
/*                         </div><!-- /.col-lg-12-->*/
/*                     </div><!-- /.row-->*/
/*                     <!-- ============ MAIN CONTENT END ============ -->*/
/*                 */
/*                 </div><!-- /.container-fluid -->*/
/*             </div><!-- /#page-content-wrapper -->*/
/*             <!-- ============ MAIN PAGE CONTENT WRAPPER ============ -->*/
/* */
/*         <!-- ============ BOOTSTRAP JS INC NAVBAR TOGGLE START ============ -->*/
/*             <script src="{{ base_url() }}/js/jquery.js"></script>*/
/*             <!-- Bootstrap Core JavaScript -->*/
/*             <script src="{{ base_url() }}/js/bootstrap.min.js"></script>*/
/*             <!-- Menu Toggle Script -->*/
/*             <script>*/
/*                 $("#menu-toggle").click(function (e) {*/
/*                     e.preventDefault();*/
/*                     $("#wrapper").toggleClass("toggled");*/
/*                 });*/
/*             </script>*/
/*         <!-- ============ BOOTSTRAP JS INC NAVBAR TOGGLED END ============ -->*/
/*         */
/*         </div><!-- /#wrapper -->*/
/*     </body>*/
/* </html>*/
/* */
