# Знакомство с Git

## Предисловие, история проблемы

После мучительной работы с обычным копированием файлов многие столкнулись с тем, что командная разработка становится тем сложнее, чем больше людей в ней участвует. Больше всего проблем возникает, когда люди работают над одними и теми же файлами.

![](https://proglib.io/wp-content/uploads/2017/06/vcsonka.jpg)

Иллюстрация из перевода статьи разработчика Warcraft Патрика Вайата:

> "...когда я начал активно работать с другими художниками и разработчиками, мы обычно использовали «пешеходную локалку», то есть по сути носили друг другу из офиса в офис флоппи-диски с изменениями, которые необходимо было внедрить в код или в дизайн.

> Боб Фитч был вторым разработчиком на проекте и мы с ним постоянно копировали файлы и изменения в коде между собой. Периодически мы ошибались при интеграции и баги, которые мы уже фиксили, открывались заново. Мы вылавливали их снова и обнаруживали, что когда копировали файлы, вносили изменения — мы перезаписывали что-то поверх удачных баг-фиксов, и порой приходилось вспоминать как мы уже закрывали эти баги заново.

> И эта ситуация повторялось всё чаще и чаще, ведь мы ускорялись в разработке, а никакого другого процесса для контроля версий, помимо метода «запоминание где и что мы редактировали» у нас не было. Мне в какой-то степени повезло больше, ведь мой компьютер хранил «мастер» ветку нашего кода, куда мы добавляли патчи, поэтому мои изменения в коде терялись реже. Сегодня для этого мы используем системы контроля версий, но тогда мы даже не могли вообразить себе такие радости жизни!"

[первая часть статьи](http://geektimes.ru/post/149298/)
[вторая часть статьи](https://geektimes.ru/post/149974/)

**Итак, основная проблема - перезаписывание неактуального кода поверх актуального, потеря актуального кода.**

Были предприняты попытки контролировать человеческий фактор, распределять файлы между разработчиками, но это все только осложнило. 

## Основы: команда diff

Уже в 1974 году существовала линуксовая команда diff.

Ниже приведен пример простого текста.

```
12345
aassddff
eerrttyy
zzzzssss
```

В следующем листинге тот же самый текст немного изменен с целью демонстрации программы diff.

```
12345
aassddff
aaa
eerrttyy
zzzzssss
```

Имея два практически идентичных файла, можно при помощи команды diff с ключами -uN понять, какая между ними разница:

```diff
--- test.txt	2016-10-11 18:29:45.000000000 +0300
+++ test1.txt	2016-10-11 18:30:58.000000000 +0300
@@ -1,4 +1,5 @@
 12345
 aassddff
+aaa
 eerrttyy
 zzzzssss
```

Команда diff работает для двух разных файлов. Система контроля версий отслеживает изменения в одном и том же файле разных версий.

## Системы контроля версий

Затем стали задумываться над тем, чтобы ограничить все возникающие сложности и управлять проблемами при помощи кода и автоматизации, стали изобретать различные программы для этих целей. 

Программы, которые позволяют сохранять различные файлы и различные версии этих файлов, сравнивать файлы и различные их версии, иметь возможность переходить между различными версиями файлов, называются **Системами контроля версий**.



### Виды систем контроля версий

Первая, простейшая СКВ - это просто **резервное копирование файлов**.

![](https://git-scm.com/figures/18333fig0101-tn.png)

Можно сохранять все в файл, или записывать в БД инфу о файлах и их версиях, но суть не меняется - все хранится **на локальном** компьютере.

Второй, более продвинутый вариант - **централизованная СКВ**. Суть такого подхода - хранение кода на сервере и использование на локальных машинах.

![](https://git-scm.com/figures/18333fig0102-tn.png)


Писк же моды в данном вопросе - **распределенная СКВ**.

![](https://git-scm.com/figures/18333fig0103-tn.png)

Изменения делаются на локальных машинах, версии же сохраняются и на них, и на сервере.

![](https://proglib.io/wp-content/uploads/2017/06/vcs.jpg)

Вот этот парень - Линус Торвальдс. 

![](https://i.ytimg.com/vi/qDNVr1ucwyE/maxresdefault.jpg) 

Он когда-то и придумал GIT, о котором мы сегодня и поговорим.


### Установка GIT

Для того, чтобы установить git под windows, попробуйте [вот эту ссылку]
(https://git-for-windows.github.io/). Установка там проста, надо соглашаться на изначальные установки и нажимать кнопку Next.


## Создание локального репозитория 

Предположим, что у нас в системе стоит git.

Для начала работы нам нужна пустая папка в удобном месте и открытая консоль в этой папке. Создаем пустую папку, заходим туда. Если у вас git bash, щелкните правой кнопкой по пустому месту в папке и выберите `git bash here`.

Оказавшись в пустой папке, мы создаем там пустой локальный git репозиторий:

```bash
[18:35:43] bandydan@BandydanMac:~/Sites/test_git
$ git init
Initialized empty Git repository in /Users/bandydan/Sites/test_git/.git/
```

Локальный репозиторий создан.

Далее, нам необходимо создать удаленный репозиторий на каком-нибудь сервере или подключиться к готовому. К примеру, создадим пустой репозиторий test_git на сервере [a-level](http://gitlab.a-level.com.ua/).

Для создания репозитория необходимо нажать кнопку new и заполнить форму создания нового репозитория.

В поле Repository name необходимо ввести имя репозитория, которое одновременно будет не слишком большим и в то же время информативным.

После того, как репозиторий создан, его надо подключить к нашему локальному репозиторию.

```bash
git remote add origin %%serverpath%%
git remote -v
git pull origin master
```

Таким образом я из созданного мной удаленного репозитория скачал изменения и слил их воедино в моем локальном репозитории. Добавлю один файл в папочку, подконтрольную гиту:

```bash
$ git add readme.txt
warning: LF will be replaced by CRLF in readme.html.
The file will have its original line endings in your working directory.
```

Проверим статус нашего репозитория:

```bash
$ git status
On branch master
Your branch is up-to-date with 'origin/master'.
Changes to be committed:
  (use "git reset HEAD <file>..." to unstage)

	new file:   readme.txt
```

Файл добавлен, теперь надо сохранить слепок изменений и 
залить его на сервер:

```bash
$ git commit -m "readme added"
[master 3d952e7] readme added
warning: LF will be replaced by CRLF in readme.html.
The file will have its original line endings in your working directory.
 1 file changed, 98 insertions(+)
 create mode 100644 readme.html
$ git push
fatal: The current branch master has no upstream branch.
To push the current branch and set the remote as upstream, use

    git push --set-upstream origin master
```

Гит ругается, говорит, ветка не задана, сервер не задан, он не понимает, куда пушить. Поясним:

```bash
$ git push origin master
Counting objects: 5, done.
Delta compression using up to 4 threads.
Compressing objects: 100% (4/4), done.
Writing objects: 100% (5/5), 789 bytes | 0 bytes/s, done.
Total 5 (delta 0), reused 0 (delta 0)
To https://github.com/Bandydan/custom
   003085e..775d992  master -> master
```

И сделаем так, чтобы он больше не ругался:

```bash
git push --set-upstream origin master
Branch master set up to track remote branch master from origin.
Everything up-to-date
```

## Перечень основных команд

```bash
git add filename # Добавление файла filename в индекс
git add * # Добавление всех файлов в индекс
git add . # Добавление всех файлов в индекс

git rm filename # Удаление файла из индекса

git status # Просмотр статуса локального репозитория

git commit # Добавление из индекса в слепок/ Требует ввода комментария
git commit -m "comment" # Добавление из индекса в слепок c быстрым вводом комментария

git diff # Сравнение веток, рабочей директории и индекса и прочие сравнения

git diff --cached # сравнение проиндексированных изменений с непроиндексировной версией кода

git reset # Отмена изменений

git push # Залить закоммиченные изменения на сервер
git fetch # Скачать новые изменения с сервера (без слияния)
git pull # Скачать новые изменения с сервера (со слиянием)


git checkout # Переключиться на ветку
git checkout -b # Переключиться на новую ветку и создать ее
git checkout filename # отменить все изменения в файле 

git branch # удаляет, создает и перечисляет ветки
```


# 4. Полезные ссылки

[Мануал по созданию rsa ключей](http://gitlab.a-level.com.ua/yozh/anykey_Repo/src/master/man-ssh-keygen.md)

[Правила размещения проекта в A-level Gitlab](http://gitlab.a-level.com.ua/gitgod/FrontendLectures/src/master/gitConvention.md)

[Книги о GIT](https://drive.google.com/drive/folders/0BzcarTnjeD1XeUptVnlDT2JibVk)

[Manual](https://try.github.io/levels/1/challenges/1)

[Git Branching](http://learngitbranching.js.org/)

[Подробнее обо всех командах git](https://git-scm.com/docs)

[Быстрый старт с GIT](http://habrahabr.ru/post/125799/)

[онлайн книга про Git](https://git-scm.com/book/ru/v1)


