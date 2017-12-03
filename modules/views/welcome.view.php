<html>
    <head>
        <title>Welcome to AK Framework !</title>
        <style>
        
            body {
                width: 100%;
                height: 100%;
                display: table;
                margin: 0;
            }
            
            .cell {
                display: table-cell;
                text-align: center;
                vertical-align: middle;
            }
            
            .cell section {
                padding: 20px 0px;
                background-color: #f2f3f4;
                font-size: 20px;
                color: #838383;
                border-top: solid 1px #e5e5e5;
                border-bottom: solid 1px #e5e5e5;
            }
            
            .cell section p {
                font-size: 15px;
            }
            
        </style>
    </head>
    
    <body>
    
        <div class="cell">
            <section>
                Welcome <?= $_SESSION['user']->name ?>
                <p>Edit modules/views/welcome.view.php to change this page</p>
              <a href="index.php?page=Login&action=Logout">Logout</a>
            </section>
        </div>
    
    </body>
    
</html>
