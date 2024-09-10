<?php
function display_recipe(array $recipe) : string
{
    $recipe_content = '';
    if ($recipe['is_enabled']) {
        $recipe_content = '<article>';
        $recipe_content .= '<h3>' . $recipe['title'] . '</h3>';
        $recipe_content .= '<div>' . $recipe['recipe'] . '</div>';
        $recipe_content .= '<i>' . $recipe['author'] . '</i>';
        $recipe_content .= '</article>';
    }
    return $recipe_content;
}

function isValidRecipe(array $recipe) : bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $isEnabled = $recipe['is_enabled'];
    } else {
        $isEnabled = false;
    }

    return $isEnabled;
}

function display_author(string $authorEmail, array $users) : string
{
    foreach ($users as $author) {
        if ($authorEmail === $author['email']) {
            return $author['full_name'] . ' (' . $author['age'] . ' ans)';
        }
    }
    return 'Auteur inconnu';
}

function get_recipes(array $recipes) : array
{
    $valid_recipes = [];
    foreach($recipes as $recipe) {
        if ($recipe['is_enabled']) {
            $valid_recipes[] = $recipe;
        }
    }
    return $valid_recipes;
}
?>
