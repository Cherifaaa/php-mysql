



 <!DOCTYPE html>
 <html>
 <head>
 <h1>Affichage des recettes</h1>
 </head>
 <body>
 <ul>
 <?php for ($lines = 0; $lines < 1; $lines++): ?>
 <li>
 <?php
$recipes = [
[
'title' => 'Cassoulet',
'recipe' => 'Etape 1 : des flageolets',
'author' => 'mickael.andrieu@exemple.com',
'is_enabled' => true,
],
[
'title' => 'Couscous',
'recipe' => 'Etape 1 : avoir du couscous',
'author' => 'mickael.andrieu@exemple.com',
'is_enabled' => false,
],
[
'title' => 'Escalope milanaise',
'recipe' => 'Etape 1 : prenez une belle escalope',
'author' => 'mathieu.nebra@exemple.com',
'is_enabled' => true,
]
];
foreach($recipes as $recipe) {
echo '<h2>' .$recipe['title'] .'<h2/>' . '<br>' .'<h4>' . ' auteur : ' . $recipe['author'] . '</h4>' .'<br>' .'<h4>' .  $recipe['recipe'] . '</h4>' . '<br>';
}?>
 </li>
 <?php endfor; ?>
 </ul>
 </body>
 </html>