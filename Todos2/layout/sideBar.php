<?php

function sideBar()
{
    $links = [
        [
            'name' => 'Profile',
            'link' => 'profile.php',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 448 512">
            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512l388.6 0c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304l-91.4 0z"/></svg>',
        ],
        [
            'name' => 'Notification',
            'link' => 'notification.php',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 448 512"><path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z"/></svg>',
        ],
        [
            'name' => 'DashBord',
            'link' => 'dashBordPage.php',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512"><path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64L0 400c0 44.2 35.8 80 80 80l400 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 416c-8.8 0-16-7.2-16-16L64 64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z"/></svg>',
        ],
        [
            'name' => 'Todos',
            'link' => 'taskPage.php',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 512 512" ><path d="M152.1 38.2c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 113C-2.3 103.6-2.3 88.4 7 79s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zm0 160c9.9 8.9 10.7 24 1.8 33.9l-72 80c-4.4 4.9-10.6 7.8-17.2 7.9s-12.9-2.4-17.6-7L7 273c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l22.1 22.1 55.1-61.2c8.9-9.9 24-10.7 33.9-1.8zM224 96c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32zM160 416c0-17.7 14.3-32 32-32l288 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-288 0c-17.7 0-32-14.3-32-32zM48 368a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>',
        ],

    ];

    echo '<div class="sidebarC">';
    echo '<ul class="inner bg-[#6e6e6e] h-full flex flex-col gap-4 mr-5 px-4 pt-3 border-r-2 border-gray-500 absolute max-w-[250px] w-64 text-white font-medium ">';
    foreach ($links as $index => $value) {
        echo '<a href="' . $value['link'] . '" class="sidebar-link flex gap-2 items-center cursor-pointer hover:underline p-1 pl-2 rounded-md hover:bg-lime-300 hover:text-black ">';
        echo $value['icon'];
        echo '<span class="link-text">' . $value['name'] . '</span>';
        echo '</a>';
    }
    echo '</ul>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Icons</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        .icon {
            height: 1rem;
            width: 1rem;
            fill: white;
            transition: fill 0.3s ease;

        }

        .sidebar-link:hover .icon {
            fill: black;
        }


        @media only screen and (max-width: 768px) {
            .sidebarc {
                margin: 0%;
                padding: 0%;
                height: 100vh;
            }

            .icon {
                height: 1.1rem;
                width: 1.1rem;
                fill: white;
                transition: fill 0.3s ease;
            }

            span {
                display: none;
            }

            .inner {
                width: 60px;
                height: 100vh;
                margin: 0;
                padding: 1rem 0 0 0;
                align-items: center;

            }

            a {
                padding: 0.6rem 0.6rem;

            }

            .sidebar-link {
                padding: 0.5rem 0.5rem;
            }

        }

        /* If needed, apply the same logic to other custom icons or elements */
    </style>
</head>

<body>
    <?php sideBar(); ?>
</body>

</html>