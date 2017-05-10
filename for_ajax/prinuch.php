<?php
session_start();
include "../bdconect.php";


if (isset($_POST['num'])) {

    /**
     * Массив со всеми встречами
     */
    $before = mysqli_query($link, "select * from `vstrechi`");


    /**
     * @param $before
     * @return mixed
     * Получение всех участников во встрече
     */
    function before($before)
    {
        foreach ($before as $r) {
            if ($r['id'] == $_POST['num']) {
                return $r['who'];
            }
        }
    }

    /**
     * @param $arr
     * @return mixed
     * Проверка на  максимальное число участников встречи
     */
    function max_uch($arr)
    {
        foreach ($arr as $key) {
            if ($key['id'] == $_POST['num']) {
                $max = $key['maxychastniki'];
                $before = before_uch($arr);
                if ($max > $before) {
                    return true;
                }
            }
        }
    }

    /**
     * @param $before
     * @return mixed
     * Получение количества зарегистрировавшихся
     */
    function before_uch($before)
    {
        foreach ($before as $r) {
            if ($r['id'] == $_POST['num']) {
                return $r['ychactniki'];
            }
        }
    }


    /**
     * @param $arr
     * @return bool
     * Проверка на регастрацию на встрече
     * Если пользователь уже зарегистрировался - ничего не произойдёт
     */
    function req($arr)
    {
        $all_uch = before($arr);
        $all_uch2 = explode(',', $all_uch);
        for ($i = 0; $i <= count($all_uch2); $i++) {
            if ($all_uch2[$i] == $_SESSION['id_who']) {
                return true;
            }
        }
    }


    /**
     * Если пользоваель не зарегистрировался он записывается в базу и число участников увеличивается на 1
     */
    if (req($before) != true && max_uch($before) == true) {
        $idvstr_who = before($before);
        $new_uch = before_uch($before) + 1;
        $vstrecha = mysqli_query($link, "UPDATE `vstrechi` SET `who`= '" . $idvstr_who . ',' . $_SESSION['id_who'] . "', `ychactniki`= $new_uch where `id` = '" . $_POST['num'] . "'");
        echo "Вы подписались на встречу!";
    } else if (req($before) == true) {
        echo "Вы уже подписаны на встречу";
    }else if (max_uch($before) != true) {
        echo "Превышен лимит участников";
    }


}