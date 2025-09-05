<!DOCTYPE html>
<html lang="en">

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";
        ?>

        <style>
            /* Ensure table container is scrollable on small screens */
            .table-responsive {
                width: 100%;
                overflow-x: auto;
                /* border: 1px solid #ddd; */
                border-radius: 8px;
            }

            .content-header {
                padding: 0;
            }

            /* Table styles */
            .table {
                width: 100%;
                min-width: 900px;
                /* Ensures proper layout on small screens */
                border-collapse: collapse;
                background-color: white;
            }

            /* Table header styles */
            .table thead {
                background-color: rgb(41, 140, 221);
            }

            .table th {
                padding: 8px;
                text-align: left;
                color: rgb(255, 255, 255);
                text-transform: uppercase;
                border-bottom: 2px solid #ddd;

            }

            /* Table body styles */
            .table td {
                padding: 12px;
                border-bottom: 1px solid #ddd;
                white-space: nowrap;
                /* Prevents text wrapping */
            }

            /* Action column icons */
            .table td a {
                margin-right: 10px;
                color: #0369a1;
                text-decoration: none;
                font-size: 16px;
            }

            /* Delete icon color */
            .table td a .fa-trash {
                color: #dc2626;
            }

            /* Button styles */
            .table td button {
                padding: 6px 12px;

                color: white;
                border: none;
                cursor: pointer;
                border-radius: 4px;
            }

            .table td button:hover {
                background-color: rgb(160, 182, 243);
            }

            /* Mobile responsiveness */
            @media screen and (max-width: 768px) {
                .table-responsive {
                    overflow-x: auto;
                }

                .table {
                    min-width: 600px;
                }

                .table th {
                    font-size: smaller;
                }
            }
        </style>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper h-auto">
            <div class="content-header">
                <div class="container-fluid">

                    <main class="max-w-full mx-auto px-2 py-2 sm:px-6 lg:px-8">



                        <div class="card">
                            <div class="card-header">
                                <div class="flex justify-between">
                                    <h3 class="card-title pt-2 text-lg"><?= $pageTitle ?></h3>
                                    <span class="btn btn-primary" onclick="addModule()">Add</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="moduleTable">
                                        <thead>
                                            <tr>
                                                <th class=" uppercase">#</th>
                                                <th class=" uppercase">Module</th>
                                                <th class=" uppercase">Module Name</th>

                                                <th class=" uppercase">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </main>
                </div>
            </div>
        </div>
    </div>

    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script src="/public/customjs/module.js"></script>
</body>

</html>