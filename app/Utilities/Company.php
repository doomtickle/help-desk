<?php

namespace App\Utilities;

class Company{

    protected static $companies = [
            "30a.beachybeach.com",
            "98realestategroup.com",
            "aahomecareinc.com",
            "aboutfuncharters.com",
            "admin.keriganserver.com",
            "afcconsultingllc.com",
            "alwfumf.org",
            "anchoredsouthboutique.com",
            "aquasouthseafood.com",
            "asuperiorac.com",
            "atchafalayagolf.com",
            "atlantaaircompany.com",
            "barefootcottagesflorida.com",
            "baycentralhs.org",
            "beachybeach.com",
            "bestwesternforestinn.com",
            "bigfishconstruction.com",
            "billreidrealestate.com",
            "blackfinconstruction.com",
            "boneandjointclinicbr.com",
            "break-a-waycharters.com",
            "brokeatoe.com",
            "c2cprinting.com",
            "campgordonjohnstongolf.com",
            "capebeachvacations.com",
            "captainscovefl.com",
            "careersourcegc.com",
            "cartilageregenerationcenter.com",
            "catheyconstruction.com",
            "ccdf-gulfcounty.org",
            "chipolaworkforce.com",
            "christiancamp.com",
            "coastalfoot.com",
            "coastlinevacationrentals.net",
            "destin.beachybeach.com",
            "doorwaysnwfl.org",
            "efgc.org",
            "eyecarenow.com",
            "fb.keriganonline.com",
            "flhealthconnector.com",
            "floridachildren.kmastage.com",
            "floridagulfcoast.com",
            "forgottencoastadventures.com",
            "frazeerecruit.com",
            "gallowayconstruction-inc.com",
            "gcscviewbook.kmastage.com",
            "gds.kmastage.com",
            "getawaygroceries.com",
            "gpcllconline.com",
            "growingmindscenterfl.org",
            "gulf.k12.fl.us",
            "gulfclerk.com",
            "gulfcountyrepublicans.com",
            "gulfdistrictadultschool.com ",
            "hannoninsurance.com",
            "indianbayoudrainage.com  ",
            "keriganadvertising.com",
            "keriganmarketing.com",
            "keriganonline.com",
            "keriganserver.com",
            "kmarketingserver.com",
            "knightsofpythiasfl.com",
            "lifemanagementcenter.org",
            "livingwateratthebeach.com",
            "mainstaysuitespsj.com",
            "manown.com",
            "methodistlearningcenter.com",
            "metrogolfacademy.net",
            "mexicobeachvacations.com",
            "millerac.net",
            "miltoninsurance.com",
            "mls.keriganserver.com/bcar",
            "mls.keriganserver.com/ecar",
            "mls.keriganserver.com/rafgc",
            "oscbr.com",
            "palmbayprep.org",
            "parkerrealtymexicobeach.com",
            "pcb.beachybeach.com",
            "pomaretail.com",
            "portcottages.com",
            "portinnfl.com",
            "portstjoeac.com",
            "portstjoewarehouseandstorage.com",
            "preble-rish.com",
            "presnellsrvresort.com",
            "psjes.com",
            "psjhs.com",
            "psjumc.org",
            "pwillys.com",
            "rfp.kerigan.com",
            "salelawfirm.com",
            "serenitybeachrentals.com",
            "southernorthopedic.com",
            "spinecenterbr.com",
            "stage.gcreg.com",
            "sterlingrealtysales.com",
            "theportfinewine.com",
            "thewickedwheel.com",
            "tightlinesgoodtimes.com",
            "triplekconstructioncompany.com",
            "tyndalleteller.com",
            "upload.kerigan.com",
            "uretekusa.com",
            "visitjacksoncountyfla.com",
            "wewaes.com",
            "wewahs.com",
            "woodsfisheries.com",
            "wptest.kmastage.com",
            "yarbroughconstruction.com",
        ];
    public static function all()
    {
        return (static::$companies);
    }

    public static function find($id)
    {
        return (static::$companies[$id]);
    }
    
}
