<?php
    namespace ClinicaVeterinaria\projeto\PHP;
    require_once('veterinario.php');
    use ClinicaVeterinaria\projeto\php\Veterinario;

 
    //Chamar as outras classes
    $vet = new Veterinario(1, "vet", "Clínico Geral", 13000, "Rua Blá", "11934242821");
    $enzo = new Veterinario(2, "Enzo", "Clínico Geral", 20000, "Rua GG", "11111111111");

    echo $vet->imprimir();
    echo $enzo->imprimir();

?>