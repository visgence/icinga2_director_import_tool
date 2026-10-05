# Director Import Tool

## Installation

On the Icinga2 server, with root access:

- Ensure that `git` is installed
- `sudo su -`
- `cd /usr/share/icingaweb2/modules` (or whatever directory is specified as `module_path` in `/etc/icingaweb2/config.ini`)
- Clone this repository into that location (`git clone https://github.com/visgence/icinga2_director_import_tool.git`)
- Enable the module either through the Web UI:
  - Log into the Web UI as admin, or some other account that has administrative privileges
  - Click the gear icon in the bottom left of the screen, and select "Modules"
  - Select "icinga2_director_import_tool" from the list of modules
  - Click on the icon beside "State: disabled" in the right-hand panel to enable the module
- Alternatively, run `icingacli module enable icinga2_director_import_tool` from the command line

## Usage

This module uses the Director API to create components in Icinga2 such as Hosts, Services, various Templates, etc. Clicking on the "Director Import Tool" entry on the left-hand menu in the Icinga2 web UI shows a screen with a dropdown menu of entities that can be created, and a text area where you can enter JSON configuration for the entities you wish to create.

One use case for the tool is to migrate entities from one Icinga server to another. When viewing a list of e.g. Service Templates in the Web UI (Icinga Director -> Services -> Service Templates), there is a dropdown menu that allows you to "Download as JSON". The format of the downloaded file will look like:

```JSON
{
    "objects": [
        ...list of service templates
    ]
}
```

You can recreate those service templates by copying the list (i.e. the content between the two square brackets, including the opening and closing square brackets) into the text area of the Import Tool, and clicking "Submit". The Import Tool will make multiple API calls, one for each entry in the list, to create the service templates, or whatever entities you wish to create. Make sure that you have the correct entity selected from the dropdown menu.

## Potential Gotchas

- If your entities depend on other entities - e.g. if a host is an instance of a host template, or if a service template inherits from another service template - ensure that either the instantiated template already exists, or that your JSON file is ordered in such a way that "parent" items are listed before their "children".
- Some of the APIs do not provide correct looking responses (fixing this is a TODO), but still create the entities correctly. It may be necessary to submit, check that the first entity in the list was created successfully, deleting that entry from the text area, and then submit again to create the next entity.
