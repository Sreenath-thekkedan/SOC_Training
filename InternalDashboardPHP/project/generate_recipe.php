<?php
// Include the FPDF library
require('fpdf.php');

if(isset($_GET['recipe'])) {
    $selectedRecipe = $_GET['recipe'];

    // Create a new instance of FPDF class
    $pdf = new FPDF();

    // Add a page
    $pdf->AddPage();

    // Set font for the title
    $pdf->SetFont('Arial','B',16);

    // Set recipe title and content based on the selected recipe
    switch ($selectedRecipe) {
        case 'burger':
            $recipeTitle = 'Burger Recipe';
            $ingredients = array(
                '- Burger bun',
                '- Beef patty',
                '- Lettuce',
                '- Tomato',
                '- Onion',
                '- Cheese'
            );
            $instructions = array(
                '1. Grill the beef patty.',
                '2. Toast the burger bun.',
                '3. Assemble the burger with lettuce, tomato, onion, cheese, and the grilled beef patty.',
                '4. Enjoy!'
            );
            break;
        case 'spaghetti':
            $recipeTitle = 'Spaghetti Recipe';
            $ingredients = array(
                '- Spaghetti pasta',
                '- Tomato sauce',
                '- Ground beef or meatballs',
                '- Onion',
                '- Garlic',
                '- Italian seasoning'
            );
            $instructions = array(
                '1. Cook spaghetti pasta according to package instructions.',
                '2. In a separate pan, cook ground beef (or meatballs), onion, and garlic until browned.',
                '3. Add tomato sauce and Italian seasoning to the pan with the cooked meat mixture.',
                '4. Simmer sauce for 10-15 minutes.',
                '5. Serve sauce over cooked spaghetti noodles.',
                '6. Enjoy!'
            );
            break;
        case 'chicken_curry':
            $recipeTitle = 'Chicken Curry Recipe';
            $ingredients = array(
                '- Chicken pieces',
                '- Curry powder',
                '- Onion',
                '- Garlic',
                '- Ginger',
                '- Coconut milk',
                '- Vegetable oil'
            );
            $instructions = array(
                '1. Heat vegetable oil in a pan over medium heat.',
                '2. Add chopped onion, garlic, and ginger to the pan and cook until softened.',
                '3. Add chicken pieces to the pan and cook until browned.',
                '4. Stir in curry powder and cook for a few minutes.',
                '5. Pour in coconut milk and simmer until chicken is cooked through and sauce is thickened.',
                '6. Serve hot with rice or naan bread.',
                '7. Enjoy!'
            );
            break;
        case 'veggie_stir_fry':
            $recipeTitle = 'Veggie Stir-Fry Recipe';
            $ingredients = array(
                '- Assorted vegetables (e.g., bell peppers, broccoli, carrots, snap peas)',
                '- Garlic',
                '- Ginger',
                '- Soy sauce',
                '- Vegetable oil',
                '- Rice or noodles (optional)'
            );
            $instructions = array(
                '1. Heat vegetable oil in a large skillet or wok over high heat.',
                '2. Add chopped garlic and ginger to the skillet and cook for a minute.',
                '3. Add assorted vegetables to the skillet and stir-fry until tender-crisp.',
                '4. Stir in soy sauce and cook for another minute.',
                '5. Serve hot as a side dish or over cooked rice or noodles.',
                '6. Enjoy!'
            );
            break;
        default:
            // Default to burger recipe if no matching recipe found
            $recipeTitle = 'Burger Recipe';
            $ingredients = array(
                '- Burger bun',
                '- Beef patty',
                '- Lettuce',
                '- Tomato',
                '- Onion',
                '- Cheese'
            );
            $instructions = array(
                '1. Grill the beef patty.',
                '2. Toast the burger bun.',
                '3. Assemble the burger with lettuce, tomato, onion, cheese, and the grilled beef patty.',
                '4. Enjoy!'
            );
            break;
    }

    // Title
    $pdf->Cell(0,10,$recipeTitle,0,1,'C');

    // Line break
    $pdf->Ln(10);

    // Set font for the content
    $pdf->SetFont('Arial','',12);

    // Ingredients
    $pdf->MultiCell(0,10,'Ingredients:',0);
    foreach ($ingredients as $ingredient) {
        $pdf->MultiCell(0,10,$ingredient,0);
    }

    // Line break
    $pdf->Ln(5);

    // Instructions
    $pdf->MultiCell(0,10,'Instructions:',0);
    foreach ($instructions as $instruction) {
        $pdf->MultiCell(0,10,$instruction,0);
    }

    // Output the PDF as a download
    $pdf->Output($selectedRecipe . '_recipe.pdf', 'D');
    exit;
}
?>
