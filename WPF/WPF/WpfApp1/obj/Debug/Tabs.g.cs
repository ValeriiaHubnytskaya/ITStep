#pragma checksum "..\..\Tabs.xaml" "{8829d00f-11b8-4213-878b-770e8597ac16}" "04A0276BC7CB5FE3E1669E64A99FAA0E85B596BF9D965967DC8E514F9F17CF2C"
//------------------------------------------------------------------------------
// <auto-generated>
//     Этот код создан программой.
//     Исполняемая версия:4.0.30319.42000
//
//     Изменения в этом файле могут привести к неправильной работе и будут потеряны в случае
//     повторной генерации кода.
// </auto-generated>
//------------------------------------------------------------------------------

using System;
using System.Diagnostics;
using System.Windows;
using System.Windows.Automation;
using System.Windows.Controls;
using System.Windows.Controls.Primitives;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Ink;
using System.Windows.Input;
using System.Windows.Markup;
using System.Windows.Media;
using System.Windows.Media.Animation;
using System.Windows.Media.Effects;
using System.Windows.Media.Imaging;
using System.Windows.Media.Media3D;
using System.Windows.Media.TextFormatting;
using System.Windows.Navigation;
using System.Windows.Shapes;
using System.Windows.Shell;
using WpfApp1;


namespace WpfApp1 {
    
    
    /// <summary>
    /// Tabs
    /// </summary>
    public partial class Tabs : System.Windows.Window, System.Windows.Markup.IComponentConnector {
        
        
        #line 25 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock X;
        
        #line default
        #line hidden
        
        
        #line 27 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Media.RotateTransform XAngle;
        
        #line default
        #line hidden
        
        
        #line 30 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock MouseX;
        
        #line default
        #line hidden
        
        
        #line 32 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Media.RotateTransform MouseXAngle;
        
        #line default
        #line hidden
        
        
        #line 35 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock Y;
        
        #line default
        #line hidden
        
        
        #line 37 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Media.RotateTransform YAngle;
        
        #line default
        #line hidden
        
        
        #line 40 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.TextBlock MouseY;
        
        #line default
        #line hidden
        
        
        #line 42 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Media.RotateTransform MouseYAngle;
        
        #line default
        #line hidden
        
        
        #line 48 "..\..\Tabs.xaml"
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1823:AvoidUnusedPrivateFields")]
        internal System.Windows.Controls.Canvas Canvas;
        
        #line default
        #line hidden
        
        private bool _contentLoaded;
        
        /// <summary>
        /// InitializeComponent
        /// </summary>
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        public void InitializeComponent() {
            if (_contentLoaded) {
                return;
            }
            _contentLoaded = true;
            System.Uri resourceLocater = new System.Uri("/WpfApp1;component/tabs.xaml", System.UriKind.Relative);
            
            #line 1 "..\..\Tabs.xaml"
            System.Windows.Application.LoadComponent(this, resourceLocater);
            
            #line default
            #line hidden
        }
        
        [System.Diagnostics.DebuggerNonUserCodeAttribute()]
        [System.CodeDom.Compiler.GeneratedCodeAttribute("PresentationBuildTasks", "4.0.0.0")]
        [System.ComponentModel.EditorBrowsableAttribute(System.ComponentModel.EditorBrowsableState.Never)]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Design", "CA1033:InterfaceMethodsShouldBeCallableByChildTypes")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Maintainability", "CA1502:AvoidExcessiveComplexity")]
        [System.Diagnostics.CodeAnalysis.SuppressMessageAttribute("Microsoft.Performance", "CA1800:DoNotCastUnnecessarily")]
        void System.Windows.Markup.IComponentConnector.Connect(int connectionId, object target) {
            switch (connectionId)
            {
            case 1:
            
            #line 9 "..\..\Tabs.xaml"
            ((WpfApp1.Tabs)(target)).MouseMove += new System.Windows.Input.MouseEventHandler(this.StackPanel_MouseMove);
            
            #line default
            #line hidden
            
            #line 10 "..\..\Tabs.xaml"
            ((WpfApp1.Tabs)(target)).MouseDown += new System.Windows.Input.MouseButtonEventHandler(this.Canvas_MouseDown);
            
            #line default
            #line hidden
            
            #line 11 "..\..\Tabs.xaml"
            ((WpfApp1.Tabs)(target)).MouseUp += new System.Windows.Input.MouseButtonEventHandler(this.Canvas_MouseUp);
            
            #line default
            #line hidden
            
            #line 12 "..\..\Tabs.xaml"
            ((WpfApp1.Tabs)(target)).MouseDoubleClick += new System.Windows.Input.MouseButtonEventHandler(this.window_MouseDoubleClick);
            
            #line default
            #line hidden
            
            #line 13 "..\..\Tabs.xaml"
            ((WpfApp1.Tabs)(target)).MouseWheel += new System.Windows.Input.MouseWheelEventHandler(this.Window_MouseWheel);
            
            #line default
            #line hidden
            return;
            case 2:
            this.X = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 3:
            this.XAngle = ((System.Windows.Media.RotateTransform)(target));
            return;
            case 4:
            this.MouseX = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 5:
            this.MouseXAngle = ((System.Windows.Media.RotateTransform)(target));
            return;
            case 6:
            this.Y = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 7:
            this.YAngle = ((System.Windows.Media.RotateTransform)(target));
            return;
            case 8:
            this.MouseY = ((System.Windows.Controls.TextBlock)(target));
            return;
            case 9:
            this.MouseYAngle = ((System.Windows.Media.RotateTransform)(target));
            return;
            case 10:
            this.Canvas = ((System.Windows.Controls.Canvas)(target));
            return;
            }
            this._contentLoaded = true;
        }
    }
}

