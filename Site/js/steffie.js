/*================================================================
	ORC_JS, JavaScript Class Framework
 	version:dhtml menu 9.1,3.10.90216
	Copyright 2008 by SourceTec Software Co.,LTD
	For more information, see:www.sothink.com
================================================================*/
if(typeof _STNS!="undefined"&&_STNS.EFFECT&&_STNS.bIsIE&&!_STNS.EFFECT.CEffIE){with(_STNS.EFFECT){_STNS.EFFECT.CEffIE=_STNS.Class(_STNS.EFFECT.CEffect);CEffIE.register("EFFECT/CEffect>CEffIE");CEffIE.construct=function(as){this.iFid=as[4]?parseInt(as[4]):-1;this.sfName="";this.iDur=as[3]||-1;this.sBak="";this._iOid=-1;this._iStat=-1;this._iGid=-1;with(_STNS.EFFECT.CEffIE){this.fiGetStat=fiGetStat;this.fbSet=fbSet;this.fbDel=fbDel;this.fbApply=fbApply;this.fbPlay=fbPlay;this.fbStop=fbStop;this.fbSetStyle=fbSetStyle;}};CEffIE._aGlobal=[];CEffIE.fiGetStat=function(){var _r=_STNS,e;if(this._iStat==-1){return -1;}if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){return e.status;}else{return this._iStat;}};CEffIE.fbSet=function(){var _r=_STNS,e,s,fs=[],i=0,_9,n;if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){if(this.sName&&_STNS.oNav.version>=5.5){s=this.sfName=this.sName;}else{if(_STNS.oNav.version<5.5&&this.iFid>=0&&this.iFid<24&&this.iDur!=-1){s=this.sfName="revealTrans(Transition="+this.iFid+",Duration="+this.iDur/1000+")";}else{return false;}}_9=e.style.filter;if(_9){var re=/[\w:\.]+\([^;\)]+\)/g;fs=_9.match(re);}if(this._iGid==-1){n=_r.EFFECT.CEffIE._aGlobal.length;_r.EFFECT.CEffIE._aGlobal.push(this);this._iGid=n;}if(!fs){fs=[];}for(i=0;i<fs.length;i++){if(fs[i]==this.sfName){this._iOid=i;return true;}}this._iOid=i;e.style.filter=(_9?_9+" ":"")+s;}this.iStat=0;return true;};CEffIE.fbDel=function(){var _r=_STNS,e,s,fs=[],bak,i,f=1,t;this.fbStop();if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){t=_STNS.EFFECT.CEffIE._aGlobal;t[this._iGid]=null;for(i=0;i<t.length;i++){if(t[i]&&t[i].sDmId==this.sDmId&&t[i].dmWin==this.dmWin&&t[i]._iOid==this._iOid){f=0;}}if(!f){return true;}bak=e.style.filter;if(bak){var re=/[\w:\.]+\([^;\)]+\)/g;fs=bak.match(re);}for(i=0;i<fs.length;i++){if(fs[i]==this.sfName){fs[i]="";}}e.style.filter=fs.length?fs.join(" "):"";for(i=0;i<t.length;i++){if(t[i]&&t[i].sDmId==this.sDmId&&t[i].dmWin==this.dmWin&&t[i]._iOid>this._iOid){t[i]._iOid--;}}}this._iStat=-1;return true;};CEffIE.fbApply=function(){var _r=_STNS,e;if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){if(e.filters[this._iOid]){e.filters[this._iOid].apply();}}this._iStat=1;return true;};CEffIE.fbPlay=function(){var _r=_STNS,e;if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){if(e.filters[this._iOid]){e.filters[this._iOid].play();}}this._iStat=2;return true;};CEffIE.fbStop=function(){var _r=_STNS,e;if(this.iStat>-1){if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){if(e.filters[this._iOid]&&e.filters[this._iOid].status){e.filters[this._iOid].stop();}}this._iStat=0;}return true;};CEffIE.fbSetStyle=function(s){var _r=_STNS,e;if(e=_r.fdmGetEleById(this.sDmId,this.dmWin)){var ss=_r.foCss2Style(s),i;for(i in ss){try{e.style[i]=ss[i];}catch(e){}}}return true;};}}