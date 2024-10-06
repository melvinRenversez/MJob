<?php

echo '

        <nav>
            <ul>
                <li>
                    <a href="../accueil/accueil.php">Accueil</a>
                    <a href="accueil.php">Paramètre</a>
                    ';
                        if($_SESSION['role'] == 'Admin'){
                            echo '<a href="../admin/admin.php">Admin</a>';
                        }
echo '
                    <a href="../php/deconnection.php">Deconnection</a>
                </li>
            </ul>
        </nav>

        <style>
        
            nav {
                width: 100%;
                display: flex;
                justify-content: flex-end;
            }

            nav ul {
                background: #454545;
                list-style-type: none;
                padding: 20px;
                border-bottom-left-radius: 20px;
            }

            nav ul li a {
                margin-left: 10px;
                color: white;
                text-decoration: none;
            }

        </style>

    ';