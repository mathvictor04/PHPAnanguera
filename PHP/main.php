<?php
    namespace ClinicaVeterinaria\projeto\PHP;
    require_once('veterinario.php');
    use ClinicaVeterinaria\projeto\php\Veterinario;

 
    //Chamar as outras classes
    $allan = new Veterinario(1, "Allan", "Clínico Geral", 13000, "Rua Blá", "11934242821");
    $joao = new Veterinario(2, "Joao", "Clínico Geral", 20000, "Rua GG", "11111111111");
    $cleide = new Veterinario(3, "Cleide", "Clinico Geral", 30000, "Rua DD", "2222222222");

    echo $allan->imprimir();
    echo $joao->imprimir();
    echo $cleide->imprimir();

?>