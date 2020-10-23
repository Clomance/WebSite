<?php
    function build_radio(){
        $qq_name = [
            "Считаете ли Вы, что у многих ваших знакомых хороший характер?",
            "Раздражают ли Вас мелкие повседневные обязанности?",
            "Верите ли Вы, что ваши друзья преданы Вам?",
            "Неприятно ли Вам, когда незнакомый человек делает Вам замечание?",
            "Способны ли Вы ударить собаку или кошку?",
            "Часто ли Вы принимаете лекарства?",
            "Часто ли Вы меняете магазин, в который ходите за продуктами?",
            "Продолжаете ли Вы отстаивать свою точку зрения, поняв, что ошиблись?",
            "Тяготят ли Вас общественные обязанности?",
            "Способны ли Вы ждать более 5 минут, не проявляя беспокойства?",
            "Часто ли Вам приходят в голову мысли о Вашей невезучести?",
            "Сохранилась ли у Вас фигура по сравнению с прошлым?",
            "Можете ли Вы с улыбкой воспринимать подтрунивание друзей?",
            "Нравится ли Вам семейная жизнь?",
            "Злопамятны ли Вы?",
            "Находите ли Вы, что стоит погода, типичная для данного времени года?",
            "Случается ли Вам с утра быть в плохом настроении?",
            "Раздражает ли Вас современная живопись?",
            "Надоедает ли Вам присутствие чужих детей в доме более одного часа?",
            "Надоедает ли Вам делать лабораторные по PHP"
        ];

        for ($qq = 0; $qq < 20; $qq++){
            echo("
                <p> $qq_name[$qq] </p>

                <label><input type=\"radio\" name=\"$qq\" value=\"true\" checked> Да</label>
                <label><input type=\"radio\" name=\"$qq\" value=\"false\"> Нет</label>
            ");
        }
    }
?>