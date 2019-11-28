<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('genres')->truncate();
        //Users::truncate(); // Opativo: vacía la tabla antes de rellenarla
        //La id no se pone porque se autoincrementa sola
        DB::table('genres')->insert(['description' => 'Terror', 'details' => 'Se caracteriza por su voluntad de provocar en el espectador sensaciones de pavor, terror, miedo, disgusto, repugnancia, horror, incomodidad o preocupación. Sus argumentos frecuentemente desarrollan la súbita intrusión en un ámbito de anormalidad de alguna fuerza, evento o personaje de naturaleza maligna o celestial, a menudo de origen criminal o sobrenatural. En los cines de terror es donde se produce una sensación de miedo o temor sobre las distintas causas que genera un determinado personaje o actor profesional.']);
        DB::table('genres')->insert(['description' => 'Intriga', 'details' => 'La intriga es el conjunto de sucesos, circunstancias y enredos que constituyen el argumento de una narración u obra cinematográfica y que provocan curiosidad e interés en el público hasta que se resuelven en el desenlace.']);
        DB::table('genres')->insert(['description' => 'Amorosa', 'details' => 'Se caracteriza por retratar argumentos construidos de eventos y personajes relacionados con la expresión del amor y las relaciones románticas. El cine romántico se centra en la representación de una historia amorosa de dos participantes, la cual atraviesa las principales etapas de la concepción del amor como el cortejo y el matrimonio.']);
        DB::table('genres')->insert(['description' => 'Detectives', 'details' => 'Ficción detectivesca o ficción con detectives o detectives en la literatura (en inglés detective fiction) es un subgénero de la novela negra y de la ficción de misterio y de suspense, en el que un investigador (muy a menudo un detective, ya sea profesional o amateur, ya sea o no integrante de las fuerzas oficiales) investiga un determinado crimen, a menudo un asesinato.']);
        DB::table('genres')->insert(['description' => 'Robots', 'details' => 'Una interpretación acertada de la robótica es que busca la creación de esclavos artificiales que nos sustituyan en el trabajo. Mano de obra que realice los trabajos tediosos, peligrosos o pesados que los humanos no queramos realizar. De este modo, el robot en el cine suele tener esta connotación, seres de aspecto mecánico, capaces de procesar y retener gran cantidad de datos y que actúan como nuestros servidores.']);
        DB::table('genres')->insert(['description' => 'Zombies', 'details' => 'Subgénero del cine de terror a menudo encuadrado dentro de la Clase B, pero que cuenta con una amplia representación de películas a lo largo de la historia. Como género independiente cuenta con sus propias convenciones, de las cuales la única fundamental es la presencia de los “muertos vivientes” (no confundir con el término mal traducido "no-muertos" del inglés "undead").']);
        DB::table('genres')->insert(['description' => 'Tiburones', 'details' => 'Algunos de los mejores generos que existen, se caracteriza unicamente por la centralización de la película en la aparición de tiburones. Generalmente como parte de catástrofes naturales.']);
        DB::table('genres')->insert(['description' => 'Animación', 'details' => 'El cine de animación es una categoría de cine (o de una manera general, una categoría de arte visual o audiovisual) que se caracteriza por no recurrir a la técnica del rodaje de imágenes reales sino a una o más técnicas de animación. Las técnicas tradicionales de animación han sido durante mucho tiempo el dibujo animado (dibujos planos en dos dimensiones fotografiados imagen por imagen) o la animación en volumen (modelos reducidos o marionetas, también fotografiados imagen por imagen), aunque en tiempos más recientes también se recurre a la animación por computadora.']);
        DB::table('genres')->insert(['description' => 'Comedia', 'details' => 'Obras que presentan una mayoría de escenas y situaciones humorísticas o festivas. Las comedias buscan entretener al público y generar risas, con finales que suelen ser felices. Comedia es también el género que agrupa a todas las obras de dichas características.']);
        DB::table('genres')->insert(['description' => 'Tragedia', 'details' => 'El drama es un género cinematográfico que trata situaciones generalmente no épicas en un contexto serio, con un tono y una orientación más susceptible de inspirar tristeza y compasión que risa o gracia.1​ Sin embargo, desde el punto de vista etimológico, el drama evoca acción y diálogo.2​3​']);
        DB::table('genres')->insert(['description' => 'Tragicomedia', 'details' => 'Es una obra dramática en la que se mezclan los elementos trágicos y cómicos, aunque también hay lugar para el sarcasmo y parodia. También se le conoce como pieza, porque se parece a dicho concepto; generalmente en estos están sintetizadas las características de una clase social, por lo que también se le denomina género psicológico.']);
        DB::table('genres')->insert(['description' => 'Policias', 'details' => 'Se entiende inició con Histoire d un crime, de Ferdinand Zecca en 1901. El argumento tiene generalmente una estructura sencilla, con introducción, desarrollo y desenlace. Usualmente al comienzo se ofrece al espectador los antecedentes de un grave crimen, acabando esta parte cuando efectivamente se comete dicho acto criminal y se arma el suspenso.']);
    }
}
