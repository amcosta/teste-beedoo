/**
 * Build DataTables
 * @param {string} id - HTML Table element ID
 * @param {string} url - Route target to ajax action
 * @param {object} identifier - Colvis, Colwidth and Colreorder settings, save and got from DB
 * @constructor init
 */
function BeedooDatatable(id, url, identifier) {
    let self = this;
    this.cols = [];
    this.userSettings = [];
    this.$htmlTable = $(id);
    this.settings = {
        columnDefs: []
    };

    //Object to customize, adding functions to be executed before render Datatablles
    this.beforeRender = {};

    //Additional parameters to send together with ajax request
    //URL data serialized
    this.params = {
        get: null,
        post: null
    };

    /**
     * Called as a constructor (on end of this method)
     */
    this.init = function ()
    {
        this.URL = url;
        this.__setIdentifier(identifier);

        // First of all, get user settings to reorder and resize columns
        // If exists some setting on database
        // Call everything after
        this.__getUserSettings(function () {
            self.__getTableCols();
            self.__checkAndExecute('beforeRender');
            self.__initTable();
        });
    };

    /**
     * Some objects can be set as a "customized function group", that are
     * configured outside of this class.
     * @param objName
     * @private
     */
    this.__checkAndExecute = function (objName)
    {
        for(let idx in this[objName]){
            if (this[objName].hasOwnProperty(idx)) {
                let func = this[objName][idx];
                func(this);
            }
        }
    };

    /**
     *
     * @private
     */
    this.__getURL = function () {
        //removed
        return this.URL;
    };

    this.__initTable = function ()
    {
        this.$dtablesObject = this.$htmlTable.DataTable({
            ajax: {
                type: "POST",
                url: self.__getURL(),
                // data: self.params.post
            },

            serverSide: true,
            processing: true,
            sDom: 'C<"clear">RZlfrtip',
            bSort:true,
            bPaginate:true,
            sPaginationType:"simple_numbers",
            searchDelay: 1000,
            responsive: true,
            autoWidth: false,
            bFilter: false,
            lengthMenu: [[10, 25, 50, 100, 500, 1000, -1], [10, 25, 50, 100, 500, 1000, "Todos"]],
            // language: {
            //     url: "assets/dataTables/plugins/i18n/Portuguese-Brasil.lang"
            // },
            columns: self.cols,
            columnDefs: self.settings.columnDefs,

            initComplete: function (a, b) {

            },

            oColVis: {
                aiExclude: [0, self.cols.length],
                fnStateChange: self.__saveColVisibility
            },

            colResize: {
                exclude: [0, self.cols.length - 1],
                resizeCallback: self.__saveColResize
            },
        }).order([1, "asc"]);

        self.__setColReorder();
    };

    /**
     * Need to be load AFTER datatables render, will change columns position
     * acording to userSettings from DB
     * This is called on render and on each column change, to save new order
     * @private
     */
    this.__setColReorder = function ()
    {
        //Removed
    };

    /**
     * ColumnDefs require a INDEX (integer) of column, this method can retrieve
     * this index according to name sent
     * @param names array|string
     * @return array
     */
    this.findColumnIdxByName = function (names)
    {
        let parent = this;
        let itemsFound = [];
        let itemsError = [];

        /**
         * used if user sent a string or for each column name sent as array and
         * running within findMany
         * @see findMany
         * @param name
         */
        function find(name)
        {
            let idxFound = false;

            for (let idx in parent.cols)
            {
                if (parent.cols.hasOwnProperty(idx))
                {
                    let col = parent.cols[idx];
                    if (col.data === name)
                    {
                        idxFound = true;
                        itemsFound.push(parseInt(idx));
                    }
                }
            }

            if (!idxFound) {
                itemsError.push(name);
                console.error("Column index for \""+name+"\" not found.");
            }
        }

        /**
         * Treat each name as unique find, using find() method.
         * @param names
         */
        function findMany(names)
        {
            for(let nameIdx in names)
            {
                if (names.hasOwnProperty(nameIdx)) {
                    let name = names[nameIdx];
                    find(name);
                }
            }
        }

        switch (typeof names)
        {
            case 'string':
                find(names);

                break;

            case 'object':
                findMany(names);
                break;

            default:
                console.error('Error. Verify data type sent. Array or String are required.');
                break;
        }

        if (itemsError.length > 0) {
            console.error("These columns weren't found:",itemsError);
        }

        return itemsFound;
    };

    this.__saveColReorder = function ()
    {
        //removed
    };

    this.__saveColResize = function ()
    {
        //removed
    };

    this.__saveColVisibility = function ()
    {
        //removed
    };

    /**
     * @param info object - Object with name of properties that comes from DB
     * used to order and positioning table columns
     * @param info.reorder
     * @param info.colvis
     * @param info.colwidth
     * @private
     */
    this.__setIdentifier = function (info)
    {
        this.identifier = info;
    };

    /**
     * Get table columns order from database and reorder (if necessary)
     * @param {function} callback - group of functions that need to be called
     * after this ajax result
     * @private
     */
    this.__getUserSettings = function (callback)
    {
        //removed
        callback();
    };

    /**
     * Setup Datatable cols from HTML Element
     * @private
     */
    this.__getTableCols = function ()
    {
        this.$htmlTable.find('thead tr th').each(function (i, column) {
            let columnID = i;
            let $column = $(column)
            let data = {"data": $(column).data('id')};

            $column.data('column-id', columnID);

            if (self.userSettings[self.identifier.colvis]) {
                data.visible = self.userSettings[self.identifier.colvis][columnID] === 'true';
            }

            if (self.userSettings[self.identifier.colwidth]) {
                if (self.userSettings[self.identifier.colwidth][columnID]) {
                    data.width = self.userSettings[self.identifier.colwidth][columnID];
                }
            }

            if ($column.attr('width') !== undefined) {
                data.width = $column.attr('width');
                $column.html('<span class="fix-width">' + $column.text() + '</span>');
                $column.find('span.fix-width').width(data.width);
            }

            self.cols.push(data);
        });
    };
}