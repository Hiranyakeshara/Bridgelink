<?php
    include("./connection/config.php");

    // Retrieve the counts from the database
    $query = "SELECT
                (SELECT COUNT(*) FROM ping) AS ping_count,
                (SELECT COUNT(*) FROM public_users) AS total_public_users_count,
                (SELECT COUNT(*) FROM vpn_users) AS total_vpn_users_count,
                (SELECT COUNT(*) FROM ip_address) AS total_ip_addresses_count,
                (SELECT COUNT(*) FROM ip_address) AS total_basenetworks_count,
                (SELECT COUNT(*) FROM vpn) AS total_vpns_count,
                (SELECT COUNT(*) FROM router) AS total_routers_count,
                (SELECT COUNT(*) FROM switch) AS total_switches_count,
                (SELECT COUNT(*) FROM endpoints) AS total_endpoints_count";

    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $ping_count = $row['ping_count'];
        $total_public_users_count = $row['total_public_users_count'];
        $total_vpn_users_count = $row['total_vpn_users_count'];
        $total_ip_addresses_count = $row['total_ip_addresses_count'];
        $total_basenetworks_count = $row['total_basenetworks_count'];
        $total_vpns_count = $row['total_vpns_count'];
        $total_routers_count = $row['total_routers_count'];
        $total_switches_count = $row['total_switches_count'];
        $total_endpoints_count = $row['total_endpoints_count'];
    } else {
        // Error handling if the query fails
        // You can set default values or display an error message
        $total_ping_count = 0;
        $total_public_users_count = 0;
        $total_vpn_users_count = 0;
        $total_ip_addresses_count = 0;
        $total_basenetworks_count = 0;
        $total_vpns_count = 0;
        $total_routers_count = 0;
        $total_switches_count = 0;
        $total_endpoints_count = 0;
    }

    // Close the database connection
    mysqli_close($con);
?>