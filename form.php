  <head>
    <meta charset="UTF-8">
    <title> Задание 3 </title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <div class="formphp">
  <form action="" method="post"> 
            <h2> Форма </h2> 
            <p><label>
              Введите имя:<br>
              <input type="text" name="fio" placeholder="Введите ваше имя">
            </label><br></p>
    
            <label> 
              <a class="uptext">Введите ваш email:</a> <br>
              <input name="email"
              type="email" /> 
            </label><br>
            <p><label>
              Введите вашу дату рождения:<br>
              <select name="year">
          <?php for($i = 1900; $i < 2020; $i++) { ?>
          <option value="<?php print $i; ?>"><?= $i; ?></option>
          <?php } ?>
          </select>
            </label> </p>
             <p> Выберете пол: </p>
              <label>
                <input type="radio" value="муж" name="sex">Мужской
              </label>
              <label>
                <input type="radio" value="жен" name="sex">Женский
              </label>
              <label>
                <input type="radio" value="иначе" name="sex">Иначе
              </label>
              <p>Количество конечностей:</p>
              <label>
                <input type="radio" value="0" name="Limbs">0
              </label>
              <label>
                <input type="radio" value="1" name="Limbs">1
              </label>
              <label>
                <input type="radio" value="2" name="Limbs">2
              </label>
              <label>
                <input type="radio" value="3" name="Limbs">3
              </label>
              <label>
                <input type="radio" value="4" name="Limbs">4
              </label>
              <br>
      
  
            <p> <label>
              <p>Выберете способности:</p>
              <select multiple="multiple" name="abilities[]" >
                <option value="breakdown" >Расщепление материи</option>
                <option value="regeneration">Регенерация</option>
                <option value="reaction">Высокая скорость реакции</option>
                <option value="resistance">Сопротивление токсинам</option>
                </select>
            </label> </p>
             

      
           <p> <label>
              Биография:<br>
              <textarea name="field-name-2"></textarea>
            </label></p>
      
            <p><label>
              <input type="checkbox" name="acquainted" value="yes">
              С контрактом ознакомлен
            </label> </p>
      
           <p class = "submit"> <input type="submit" value="Отправить"></p>
      
          </form>
      </div>
      </body>