var _gaq=_gaq||[];var stFailbackDefaults={trackScrolling:true,stLogInterval:10,docTitle:window.document.title,cutOffTime:900,trackNoEvents:false,trackNoMaxTime:false};window.total_time=0;var stIntervalObj=null;function TrackingLogTime(tosArray){return tosArray[0]==50?(parseInt(tosArray[1])+1)+":00":(tosArray[1]||"0")+":"+(parseInt(tosArray[0])+10)}function stInitializeControlVars(){if(typeof window.trackScrolling=="undefined"){window.trackScrolling=window.stFailbackDefaults.trackScrolling}if(typeof window.stLogInterval=="undefined"){window.stLogInterval=window.stFailbackDefaults.stLogInterval*1000}if(typeof window.docTitle=="undefined"){window.docTitle=window.stFailbackDefaults.docTitle}if(typeof window.cutOffTime=="undefined"){window.cutOffTime=window.stFailbackDefaults.cutOffTime}if(typeof window.trackNoEvents=="undefined"){window.trackNoEvents=window.stFailbackDefaults.trackNoEvents}if(typeof window.trackNoMaxTime=="undefined"){window.trackNoMaxTime=window.stFailbackDefaults.trackNoMaxTime}if(window.trackScrolling===true){setTimeout(function(){window.onscroll=function(){window.onscroll=null;_gaq.push(["_trackEvent","Scroll",window.docTitle,"scrolled"])}},2000)}}if(window.trackNoEvents===false){function startTimeTracking(tos){stInitializeControlVars();window.stIntervalObj=window.setInterval(function(){total_time+=10;if(window.trackNoMaxTime===true){total_time=1}if(window.total_time<=window.cutOffTime){tos=TrackingLogTime(tos.split(":").reverse());_gaq.push(["_trackEvent","Time","Log",tos])}else{window.clearInterval(window.stIntervalObj)}},(window.stLogInterval))}jQuery(document).ready(function(){startTimeTracking("00")})};