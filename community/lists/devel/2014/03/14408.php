<?
$subject_val = "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Mar 27 11:15:47 2014" -->
<!-- isoreceived="20140327151547" -->
<!-- sent="Thu, 27 Mar 2014 15:15:35 +0000" -->
<!-- isosent="20140327151535" -->
<!-- name="Wang,Yanfei(SYS)" -->
<!-- email="wangyanfei01_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] &amp;#180;&amp;#240;&amp;#184;&amp;#180;: &amp;#180;&amp;#240;&amp;#184;&amp;#180;: doubt on latency result with OpenMPI library" -->
<!-- id="C381729D-4CDA-40A0-8C57-1D6CA9121BFB_at_baidu.com" -->
<!-- charset="gb2312" -->
<!-- inreplyto="CAMD57odyimbU3a3MYAAR24UnbtbrsH7M3fSAaBL1bzioTdfkUw_at_mail.gmail.com" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>Subject:</strong> Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library<br>
<strong>From:</strong> Wang,Yanfei(SYS) (<em>wangyanfei01_at_[hidden]</em>)<br>
<strong>Date:</strong> 2014-03-27 11:15:35
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>Previous message:</strong> <a href="14407.php">Wang,Yanfei(SYS): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>In reply to:</strong> <a href="14406.php">Ralph Castain: "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>Reply:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Normally we use rdma-cm to build rdma connection ,then create Qpairs to do rdma data transmit ion, so what is the consideration for separating rdma-cm connection built and data transmit ion at design stage?
<br>

<br>
Maybe this question is not reasonable, and hope any response?
<br>

<br>
Thanks
<br>
Yanfei
<br>

<br>
Sent from my iPad
<br>

<br>
On 2014&#196;&#234;3&#212;&#194;27&#200;&#213;, at &#207;&#194;&#206;&#231;10:10, &quot;Ralph Castain&quot; &lt;rhc_at_[hidden]&lt;mailto:rhc_at_[hidden]&gt;&gt; wrote:
<br>

<br>
Just one other point to clarify - there is an apparent misunderstanding regarding the following MCA param:
<br>

<br>
-mca btl_openib_cpc_include rdmacm
<br>

<br>
This param has nothing to do with telling openib to use RDMA for communication. What it does is tell the openib BTL to use RDMA to establish the point-to-point connection between the two processes. The actual messaging may or may not use RDMA to move the bytes - that's a totally separate code path.
<br>

<br>

<br>

<br>
On Thu, Mar 27, 2014 at 6:21 AM, Wang,Yanfei(SYS) &lt;wangyanfei01_at_[hidden]&lt;mailto:wangyanfei01_at_[hidden]&gt;&gt; wrote:
<br>
it seem that all confusions have already been shot, thanks Jeff!
<br>

<br>
Thanks!
<br>
Yanfei
<br>

<br>
Sent from my iPad
<br>

<br>
<span class="quotelev1">&gt; On 2014&#196;&#234;3&#212;&#194;27&#200;&#213;, at &#207;&#194;&#206;&#231;8:38, &quot;Jeff Squyres (jsquyres)&quot; &lt;jsquyres_at_[hidden]&lt;mailto:jsquyres_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Here's a few key facts that might help:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; 1. The hostfile has nothing to do with what network interfaces are used for MPI traffic.  It is only used to specify what servers you launch on, regardless of what IP interface on that server you specify.
</span><br>
<span class="quotelev1">&gt; 2. What network interfaces are used are a combination of the BTL selected and then any optional additional parameters given that that BTL.
</span><br>
<span class="quotelev1">&gt; 3. If you do not specify any BTL, then Open MPI will choose the &quot;best&quot; ones, and use that.
</span><br>
<span class="quotelev1">&gt; 4. As of somewhere in the v1.7.x series, the ompi_info command only shows a few MCA parameters by default.  To see all MCA parameters, add &quot;--level 9&quot; to the command line.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; In your case, if you didn't specify a BTL, Open MPI would see your RoCE interfaces and therefore choose the openib BTL for off-node communication (and exclude the TCP BTL, because it is &quot;worse&quot; than the openib BTL), sm for on-node communication, and self for loopback communication.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; If you specify --mca btl tcp,sm,self, then you are restricting OMPI's pool of BTLs that it can choose from -- meaning that the openib BTL won't even be considered.  So OMPI will therefore use the TCP BTL for off-node communication.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Also, remember that you can &quot;mpirun ... hostname&quot; (i.e., the Linux &quot;hostname&quot; command) to verify what servers you are actually running on.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; I see that the ompi_info(1) man page is not super-detailed about the --level option; I'll go fix that right now (and ensure it's in the v1.8 release).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Mar 27, 2014, at 6:44 AM, &quot;Wang,Yanfei(SYS)&quot; &lt;wangyanfei01_at_[hidden]&lt;mailto:wangyanfei01_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hi,
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Update:
</span><br>
<span class="quotelev2">&gt;&gt; If explicitly assign --mca btl tcp,sm,self and the traffic will go 10G TCP/IP link instead of 40G RDMA link, and the tcp/ip latency is 22us at average, which is reasonable.
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# mpirun --hostfile hosts -np 2 --map-by node --mca btl tcp,sm,self osu_latency
</span><br>
<span class="quotelev2">&gt;&gt; # OSU MPI Latency Test v4.3
</span><br>
<span class="quotelev2">&gt;&gt; # Size          Latency (us)
</span><br>
<span class="quotelev2">&gt;&gt; 0                      22.07
</span><br>
<span class="quotelev2">&gt;&gt; 1                      22.48
</span><br>
<span class="quotelev2">&gt;&gt; 2                      22.38
</span><br>
<span class="quotelev2">&gt;&gt; 4                      22.39
</span><br>
<span class="quotelev2">&gt;&gt; 8                      22.52
</span><br>
<span class="quotelev2">&gt;&gt; 16                     22.52
</span><br>
<span class="quotelev2">&gt;&gt; 32                     22.59
</span><br>
<span class="quotelev2">&gt;&gt; 64                     22.73
</span><br>
<span class="quotelev2">&gt;&gt; 128                    23.01
</span><br>
<span class="quotelev2">&gt;&gt; 256                    24.32
</span><br>
<span class="quotelev2">&gt;&gt; 512                    28.50
</span><br>
<span class="quotelev2">&gt;&gt; 1024                   31.06
</span><br>
<span class="quotelev2">&gt;&gt; 2048                   56.06
</span><br>
<span class="quotelev2">&gt;&gt; 4096                   68.53
</span><br>
<span class="quotelev2">&gt;&gt; 8192                   77.09
</span><br>
<span class="quotelev2">&gt;&gt; 16384                 105.23
</span><br>
<span class="quotelev2">&gt;&gt; 32768                 143.51
</span><br>
<span class="quotelev2">&gt;&gt; 65536                 229.79
</span><br>
<span class="quotelev2">&gt;&gt; 131072                285.28
</span><br>
<span class="quotelev2">&gt;&gt; 262144                423.26
</span><br>
<span class="quotelev2">&gt;&gt; 524288                693.82
</span><br>
<span class="quotelev2">&gt;&gt; 1048576              1634.03
</span><br>
<span class="quotelev2">&gt;&gt; 2097152              3311.69
</span><br>
<span class="quotelev2">&gt;&gt; 4194304              7055.16
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; The conclusion is that the &#161;&#176; &#168;Chostfile with 10G IP address&#161;&#177; does enable traffic select 10G TCP/IP link, and mpirun select RDMA link by default even if you did not enable  &#161;&#176;--mca btl openib,sm,self&#161;&#177;!
</span><br>
<span class="quotelev2">&gt;&gt; So&#163;&#172; how to understand that &#161;&#176;&#168;Chostfile&#161;&#177; does not work fine and how to control the multi-HCA(NIC) traffic for MPI library?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Besides, the following command does not reflect any information about rdma transport parameter control except tcp parameter.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# ompi_info --param btl all
</span><br>
<span class="quotelev2">&gt;&gt;                 MCA btl: parameter &quot;btl_tcp_if_include&quot; (current value: &quot;&quot;,
</span><br>
<span class="quotelev2">&gt;&gt;                          data source: default, level: 1 user/basic, type:
</span><br>
<span class="quotelev2">&gt;&gt;                          string)
</span><br>
<span class="quotelev2">&gt;&gt;                          Comma-delimited list of devices and/or CIDR
</span><br>
<span class="quotelev2">&gt;&gt;                          notation of networks to use for MPI communication
</span><br>
<span class="quotelev2">&gt;&gt;                          (e.g., &quot;eth0,192.168.0.0/16&lt;<a href="http://192.168.0.0/16">http://192.168.0.0/16</a>&gt;&quot;).  Mutually exclusive
</span><br>
<span class="quotelev2">&gt;&gt;                          with btl_tcp_if_exclude.
</span><br>
<span class="quotelev2">&gt;&gt;                 MCA btl: parameter &quot;btl_tcp_if_exclude&quot; (current value:
</span><br>
<span class="quotelev2">&gt;&gt;                          &quot;127.0.0.1/8,sppp&lt;<a href="http://127.0.0.1/8,sppp">http://127.0.0.1/8,sppp</a>&gt;&quot;, data source: default, level: 1
</span><br>
<span class="quotelev2">&gt;&gt;                          user/basic, type: string)
</span><br>
<span class="quotelev2">&gt;&gt;                          Comma-delimited list of devices and/or CIDR
</span><br>
<span class="quotelev2">&gt;&gt;                          notation of networks to NOT use for MPI
</span><br>
<span class="quotelev2">&gt;&gt;                          communication -- all devices not matching these
</span><br>
<span class="quotelev2">&gt;&gt;                          specifications will be used (e.g.,
</span><br>
<span class="quotelev2">&gt;&gt;                          &quot;eth0,192.168.0.0/16&lt;<a href="http://192.168.0.0/16">http://192.168.0.0/16</a>&gt;&quot;).  If set to a non-default
</span><br>
<span class="quotelev2">&gt;&gt;                          value, it is mutually exclusive with
</span><br>
<span class="quotelev2">&gt;&gt;                          btl_tcp_if_include.
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]#
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Hope to have a deep understand on it~
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks
</span><br>
<span class="quotelev2">&gt;&gt; --Yanfei
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#183;&#162;&#188;&#254;&#200;&#203;: devel [mailto:devel-bounces_at_[hidden]&lt;mailto:devel-bounces_at_[hidden]&gt;] &#180;&#250;&#177;&#237; Wang,Yanfei(SYS)
</span><br>
<span class="quotelev2">&gt;&gt; &#183;&#162;&#203;&#205;&#202;&#177;&#188;&#228;: 2014&#196;&#234;3&#212;&#194;27&#200;&#213; 18:17
</span><br>
<span class="quotelev2">&gt;&gt; &#202;&#213;&#188;&#254;&#200;&#203;: Open MPI Developers
</span><br>
<span class="quotelev2">&gt;&gt; &#214;&#247;&#204;&#226;: [OMPI devel] &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; HI&#163;&#172;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; &#161;&#176;--map-by node&#161;&#177; does remove this trouble.
</span><br>
<span class="quotelev2">&gt;&gt; ---
</span><br>
<span class="quotelev2">&gt;&gt; Configuration:
</span><br>
<span class="quotelev2">&gt;&gt; Even if using mpi --hostfile to control traffic to go 10G TCP/IP network, and the latency still is 5us in both situation!
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# cat /etc/hosts
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.3 ib03
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.4 ib04
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# ifconfig
</span><br>
<span class="quotelev2">&gt;&gt; eth0      Link encap:Ethernet  HWaddr 20:0B:C7:26:3F:C3
</span><br>
<span class="quotelev2">&gt;&gt;          inet addr:192.168.71.4  Bcast:192.168.71.255  Mask:255.255.255.0
</span><br>
<span class="quotelev2">&gt;&gt;          inet6 addr: fe80::220b:c7ff:fe26:3fc3/64 Scope:Link
</span><br>
<span class="quotelev2">&gt;&gt;          UP BROADCAST RUNNING MULTICAST  MTU:1500  Metric:1
</span><br>
<span class="quotelev2">&gt;&gt;          RX packets:834635 errors:0 dropped:0 overruns:0 frame:0
</span><br>
<span class="quotelev2">&gt;&gt;          TX packets:339853 errors:0 dropped:0 overruns:0 carrier:0
</span><br>
<span class="quotelev2">&gt;&gt;          collisions:0 txqueuelen:1000
</span><br>
<span class="quotelev2">&gt;&gt;          RX bytes:681908607 (650.3 MiB)  TX bytes:103031295 (98.2 MiB)
</span><br>
<span class="quotelev2">&gt;&gt; 10G eth0 is not rdma-enabled nic~
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; a.       using openib
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# mpirun --hostfile hosts -np 2 --map-by node --mca btl openib,self,sm --mca btl_openib_cpc_include rdmacm osu_latency
</span><br>
<span class="quotelev2">&gt;&gt; # OSU MPI Latency Test v4.3
</span><br>
<span class="quotelev2">&gt;&gt; # Size          Latency (us)
</span><br>
<span class="quotelev2">&gt;&gt; 0                       5.20
</span><br>
<span class="quotelev2">&gt;&gt; 1                       5.36
</span><br>
<span class="quotelev2">&gt;&gt; 2                       5.31
</span><br>
<span class="quotelev2">&gt;&gt; 4                       5.34
</span><br>
<span class="quotelev2">&gt;&gt; 8                       5.46
</span><br>
<span class="quotelev2">&gt;&gt; 16                      5.35
</span><br>
<span class="quotelev2">&gt;&gt; 32                      5.44
</span><br>
<span class="quotelev2">&gt;&gt; 64                      5.48
</span><br>
<span class="quotelev2">&gt;&gt; 128                     6.74
</span><br>
<span class="quotelev2">&gt;&gt; 256                     6.87
</span><br>
<span class="quotelev2">&gt;&gt; 512                     7.05
</span><br>
<span class="quotelev2">&gt;&gt; 1024                    7.52
</span><br>
<span class="quotelev2">&gt;&gt; 2048                    8.38
</span><br>
<span class="quotelev2">&gt;&gt; 4096                   10.36
</span><br>
<span class="quotelev2">&gt;&gt; 8192                   14.18
</span><br>
<span class="quotelev2">&gt;&gt; 16384                  23.69
</span><br>
<span class="quotelev2">&gt;&gt; 32768                  31.91
</span><br>
<span class="quotelev2">&gt;&gt; 65536                  38.89
</span><br>
<span class="quotelev2">&gt;&gt; 131072                 47.76
</span><br>
<span class="quotelev2">&gt;&gt; 262144                 80.42
</span><br>
<span class="quotelev2">&gt;&gt; 524288                137.52
</span><br>
<span class="quotelev2">&gt;&gt; 1048576               251.81
</span><br>
<span class="quotelev2">&gt;&gt; 2097152               485.23
</span><br>
<span class="quotelev2">&gt;&gt; 4194304               948.08
</span><br>
<span class="quotelev2">&gt;&gt; b.       have no explicit rdma setting.
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# mpirun --hostfile hosts -np 2 --map-by node osu_latency
</span><br>
<span class="quotelev2">&gt;&gt; # OSU MPI Latency Test v4.3
</span><br>
<span class="quotelev2">&gt;&gt; # Size          Latency (us)
</span><br>
<span class="quotelev2">&gt;&gt; 0                       5.23
</span><br>
<span class="quotelev2">&gt;&gt; 1                       5.28
</span><br>
<span class="quotelev2">&gt;&gt; 2                       5.21
</span><br>
<span class="quotelev2">&gt;&gt; 4                       5.33
</span><br>
<span class="quotelev2">&gt;&gt; 8                       5.33
</span><br>
<span class="quotelev2">&gt;&gt; 16                      5.36
</span><br>
<span class="quotelev2">&gt;&gt; 32                      5.33
</span><br>
<span class="quotelev2">&gt;&gt; 64                      5.41
</span><br>
<span class="quotelev2">&gt;&gt; 128                     6.74
</span><br>
<span class="quotelev2">&gt;&gt; 256                     6.98
</span><br>
<span class="quotelev2">&gt;&gt; 512                     7.11
</span><br>
<span class="quotelev2">&gt;&gt; 1024                    7.47
</span><br>
<span class="quotelev2">&gt;&gt; 2048                    8.46
</span><br>
<span class="quotelev2">&gt;&gt; 4096                   10.38
</span><br>
<span class="quotelev2">&gt;&gt; 8192                   14.30
</span><br>
<span class="quotelev2">&gt;&gt; 16384                  21.20
</span><br>
<span class="quotelev2">&gt;&gt; 32768                  31.21
</span><br>
<span class="quotelev2">&gt;&gt; 65536                  39.85
</span><br>
<span class="quotelev2">&gt;&gt; 131072                 47.70
</span><br>
<span class="quotelev2">&gt;&gt; 262144                 80.24
</span><br>
<span class="quotelev2">&gt;&gt; 524288                137.59
</span><br>
<span class="quotelev2">&gt;&gt; 1048576               251.62
</span><br>
<span class="quotelev2">&gt;&gt; 2097152               485.14
</span><br>
<span class="quotelev2">&gt;&gt; 4194304               945.80
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]#
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I found that the bandwidth got from osu_bw benchmark is equal to 40G RDMA HCA, so I doubt if the traffic always goes between 40G RDMA link, and the control for TCP/IP link does work.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; I will consult the FAQ for details, if further suggestion, welcome..
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks
</span><br>
<span class="quotelev2">&gt;&gt; --Yanfei
</span><br>
<span class="quotelev2">&gt;&gt; &#183;&#162;&#188;&#254;&#200;&#203;: devel [mailto:devel-bounces_at_[hidden]&lt;mailto:devel-bounces_at_[hidden]&gt;] &#180;&#250;&#177;&#237; Ralph Castain
</span><br>
<span class="quotelev2">&gt;&gt; &#183;&#162;&#203;&#205;&#202;&#177;&#188;&#228;: 2014&#196;&#234;3&#212;&#194;27&#200;&#213; 18:05
</span><br>
<span class="quotelev2">&gt;&gt; &#202;&#213;&#188;&#254;&#200;&#203;: Open MPI Developers
</span><br>
<span class="quotelev2">&gt;&gt; &#214;&#247;&#204;&#226;: Re: [OMPI devel] doubt on latency result with OpenMPI library
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Try adding &quot;--map-by node&quot; to your command line to ensure the procs really are running on separate nodes.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; On Thu, Mar 27, 2014 at 1:40 AM, Wang,Yanfei(SYS) &lt;wangyanfei01_at_[hidden]&lt;mailto:wangyanfei01_at_[hidden]&gt;&gt; wrote:
</span><br>
<span class="quotelev2">&gt;&gt; Hi&#163;&#172;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; HW Test Topology&#163;&#186;
</span><br>
<span class="quotelev2">&gt;&gt; Ip&#163;&#186;192.168.72.4/24&lt;<a href="http://192.168.72.4/24">http://192.168.72.4/24</a>&gt; &#168;C192.168.72.4/24&lt;<a href="http://192.168.72.4/24">http://192.168.72.4/24</a>&gt;, enable vlan and RoCE
</span><br>
<span class="quotelev2">&gt;&gt; IB03 server 40G port-- - 40G Ethernet switch ----IB04 server 40G port&#163;&#186; configure it as RoCE link
</span><br>
<span class="quotelev2">&gt;&gt; IP: 192.168.71.3/24&lt;<a href="http://192.168.71.3/24">http://192.168.71.3/24</a>&gt; ---192.168.71.4/24&lt;<a href="http://192.168.71.4/24">http://192.168.71.4/24</a>&gt;
</span><br>
<span class="quotelev2">&gt;&gt; IB03 server 10G port &#168;C 10G Ethernet switch &#168;C IB04 server 10G port&#163;&#186; configure it as normal TCP/IP Ethernet link&#163;&#186;&#163;&#168;server management interface&#163;&#169;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Mpi configuration&#163;&#186;
</span><br>
<span class="quotelev2">&gt;&gt; MPI Hosts file&#163;&#186;
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# cat hosts
</span><br>
<span class="quotelev2">&gt;&gt; ib03 slots=1
</span><br>
<span class="quotelev2">&gt;&gt; ib04 slots=1
</span><br>
<span class="quotelev2">&gt;&gt; DNS hosts
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# cat /etc/hosts
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.3 ib03
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.4 ib04
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]#
</span><br>
<span class="quotelev2">&gt;&gt; This configuration will create 2 nodes for MPI latency evaluation
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Benchmark:
</span><br>
<span class="quotelev2">&gt;&gt; osu-micro-benchmarks-4.3
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; result:
</span><br>
<span class="quotelev2">&gt;&gt; a.       Enable traffic go between 10G TCP/IP port using following /etc/hosts file
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; root_at_bb-nsi-ib04 pt2pt]# cat /etc/hosts
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.3 ib03
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.71.4 ib04
</span><br>
<span class="quotelev2">&gt;&gt; The average latency is 4.5us of osu_latency, see log following:
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# mpirun --hostfile hosts -np 2 osu_latency
</span><br>
<span class="quotelev2">&gt;&gt; # OSU MPI Latency Test v4.3
</span><br>
<span class="quotelev2">&gt;&gt; # Size          Latency (us)
</span><br>
<span class="quotelev2">&gt;&gt; 0                       4.56
</span><br>
<span class="quotelev2">&gt;&gt; 1                       4.90
</span><br>
<span class="quotelev2">&gt;&gt; 2                       4.90
</span><br>
<span class="quotelev2">&gt;&gt; 4                       4.60
</span><br>
<span class="quotelev2">&gt;&gt; 8                       4.71
</span><br>
<span class="quotelev2">&gt;&gt; 16                      4.72
</span><br>
<span class="quotelev2">&gt;&gt; 32                      5.40
</span><br>
<span class="quotelev2">&gt;&gt; 64                      4.77
</span><br>
<span class="quotelev2">&gt;&gt; 128                     6.74
</span><br>
<span class="quotelev2">&gt;&gt; 256                     7.01
</span><br>
<span class="quotelev2">&gt;&gt; 512                     7.14
</span><br>
<span class="quotelev2">&gt;&gt; 1024                    7.63
</span><br>
<span class="quotelev2">&gt;&gt; 2048                    8.22
</span><br>
<span class="quotelev2">&gt;&gt; 4096                   10.39
</span><br>
<span class="quotelev2">&gt;&gt; 8192                   14.26
</span><br>
<span class="quotelev2">&gt;&gt; 16384                  20.80
</span><br>
<span class="quotelev2">&gt;&gt; 32768                  31.97
</span><br>
<span class="quotelev2">&gt;&gt; 65536                  37.75
</span><br>
<span class="quotelev2">&gt;&gt; 131072                 47.28
</span><br>
<span class="quotelev2">&gt;&gt; 262144                 80.40
</span><br>
<span class="quotelev2">&gt;&gt; 524288                137.65
</span><br>
<span class="quotelev2">&gt;&gt; 1048576               250.17
</span><br>
<span class="quotelev2">&gt;&gt; 2097152               484.71
</span><br>
<span class="quotelev2">&gt;&gt; 4194304               946.01
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; b.       Enable traffic go between RoCE link using /etc/hosts as following and mpirun &#168;Cmca btl openib,self,sm &#161;&#173;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# cat /etc/hosts
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.72.3 ib03
</span><br>
<span class="quotelev2">&gt;&gt; 192.168.72.4 ib04
</span><br>
<span class="quotelev2">&gt;&gt; Result:
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]# mpirun --hostfile hosts -np 2 --mca btl openib,self,sm --mca btl_openib_cpc_include rdmacm osu_latency
</span><br>
<span class="quotelev2">&gt;&gt; # OSU MPI Latency Test v4.3
</span><br>
<span class="quotelev2">&gt;&gt; # Size          Latency (us)
</span><br>
<span class="quotelev2">&gt;&gt; 0                       4.83
</span><br>
<span class="quotelev2">&gt;&gt; 1                       5.17
</span><br>
<span class="quotelev2">&gt;&gt; 2                       5.12
</span><br>
<span class="quotelev2">&gt;&gt; 4                       5.25
</span><br>
<span class="quotelev2">&gt;&gt; 8                       5.38
</span><br>
<span class="quotelev2">&gt;&gt; 16                      5.40
</span><br>
<span class="quotelev2">&gt;&gt; 32                      5.19
</span><br>
<span class="quotelev2">&gt;&gt; 64                      5.04
</span><br>
<span class="quotelev2">&gt;&gt; 128                     6.74
</span><br>
<span class="quotelev2">&gt;&gt; 256                     7.04
</span><br>
<span class="quotelev2">&gt;&gt; 512                     7.34
</span><br>
<span class="quotelev2">&gt;&gt; 1024                    7.91
</span><br>
<span class="quotelev2">&gt;&gt; 2048                    8.17
</span><br>
<span class="quotelev2">&gt;&gt; 4096                   10.39
</span><br>
<span class="quotelev2">&gt;&gt; 8192                   14.22
</span><br>
<span class="quotelev2">&gt;&gt; 16384                  22.05
</span><br>
<span class="quotelev2">&gt;&gt; 32768                  31.68
</span><br>
<span class="quotelev2">&gt;&gt; 65536                  37.57
</span><br>
<span class="quotelev2">&gt;&gt; 131072                 48.25
</span><br>
<span class="quotelev2">&gt;&gt; 262144                 79.98
</span><br>
<span class="quotelev2">&gt;&gt; 524288                137.66
</span><br>
<span class="quotelev2">&gt;&gt; 1048576               251.38
</span><br>
<span class="quotelev2">&gt;&gt; 2097152               485.66
</span><br>
<span class="quotelev2">&gt;&gt; 4194304               947.81
</span><br>
<span class="quotelev2">&gt;&gt; [root_at_bb-nsi-ib04 pt2pt]#
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Question:
</span><br>
<span class="quotelev2">&gt;&gt; 1.       Why do they have similar latency, 5us, which is too small to believe it! In our test environment, it will take more than 50 us to deal with tcp sync and return sync_ack, and also x86 server will take more thans 20us at average to do ip forwarding(test from professional HW tester), so does the latency is reasonable?
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; 2.       Normally, the switch will introduces more than 1.5us switch time! Using accelio, a mellanox released opensource rdma library, it will take at least 4 us rtt latency to do simpe ping-pong test. So 5 us MPI latency (TCP/IP and RoCE) above is rather unbelievable&#161;&#173;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; 3.       The fact that the tcp/ip transport and roce RDMA transport acquire same latency  is so puzzling..
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Before deeply understanding what happened inside the MPI benchmark, can show us some suggestion? Does the mpirun command works correctly here?
</span><br>
<span class="quotelev2">&gt;&gt; It must has some mistakes about this test, pls correct me,.
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Eg: tcp syn&amp;sync ack latency:
</span><br>
<span class="quotelev2">&gt;&gt; &lt;image001.png&gt;
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Thanks
</span><br>
<span class="quotelev2">&gt;&gt; -Yanfei
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/03/14400.php">http://www.open-mpi.org/community/lists/devel/2014/03/14400.php</a>
</span><br>
<span class="quotelev2">&gt;&gt;
</span><br>
<span class="quotelev2">&gt;&gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt;&gt; devel mailing list
</span><br>
<span class="quotelev2">&gt;&gt; devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev2">&gt;&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt;&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/03/14403.php">http://www.open-mpi.org/community/lists/devel/2014/03/14403.php</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]&lt;mailto:jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/03/14404.php">http://www.open-mpi.org/community/lists/devel/2014/03/14404.php</a>
</span><br>

<br>
_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/03/14405.php">http://www.open-mpi.org/community/lists/devel/2014/03/14405.php</a>
<br>

<br>
_______________________________________________
<br>
devel mailing list
<br>
devel_at_[hidden]&lt;mailto:devel_at_[hidden]&gt;
<br>
Subscription: <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
<br>
Link to this post: <a href="http://www.open-mpi.org/community/lists/devel/2014/03/14406.php">http://www.open-mpi.org/community/lists/devel/2014/03/14406.php</a>
<br>
<hr>
<ul>
<li>text/html attachment: <a href="http://www.open-mpi.org/community/lists/devel/att-14408/attachment">attachment</a>
</ul>
<!-- attachment="attachment" -->
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>Previous message:</strong> <a href="14407.php">Wang,Yanfei(SYS): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>In reply to:</strong> <a href="14406.php">Ralph Castain: "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<li><strong>Reply:</strong> <a href="14409.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] &#180;&#240;&#184;&#180;: &#180;&#240;&#184;&#180;: doubt on latency result with OpenMPI library"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
