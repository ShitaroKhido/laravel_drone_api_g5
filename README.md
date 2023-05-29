# API Documentation

## Farmer controlls

| PATH                         |                       Descriptions                       | Method |
| :--------------------------- | :------------------------------------------------------: | -----: |
| /api/drone                   |                 List all the user drone                  |    GET |
| /api/drone/{id}              |                   Get drone info by id                   |    GET |
| /api/drone/{id}/location     |                Get current drone location                |    GET |
| /api/map_pictures            |                 List all available maps                  |    GET |
| /api/maps/{province}/{id}    |             Download farm map from location              |    GET |
| /api/maps/{province}/{id}    |              Delete farm map from location               | DELETE |
| /api/plans                   |                Added plans for the drone                 |   POST |
| /api/instruction/drones/{id} | Instruct drone id to enter run mode with a given plan ID |    PUT |

## Drone controlls

This part contain the method and option that can be use with drone side.

| PATH                    |            Descriptions             | Method |
| :---------------------- | :---------------------------------: | -----: |
| /api/instruction/1      |      Request new instructions       |    GET |
| /api/plan/order11       |        Request plan by name         |    GET |
| /api/drone/{id}         | Update the system of current status |    PUT |
| /api/maps/Kampongcham/1 |    Upload farm map from location    |   POST |

## Data Input for URI with POST and PUT method

-   `/api/plans` from farmer controll take input as the following below

    ```note
      name: string

    ```

-   `/api/drone/{id}` from drone controll take input as the following below

    ```json
    {
        "name": "",
        "model": "",
        "serial_number": "",
        "battery_capacity": 0,
        "payload_size": 0
    }
    ```

`NOTE`

-   Most of the PUT method are using JSON format for its request data.

-   Others resource code can be checked inside the `route/api.php` folder.
